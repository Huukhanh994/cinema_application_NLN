<?php

namespace App\Http\Controllers\Site;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Models\Seat;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function placeOrder(Request $request)
    {
        // # Danh sách các tên ghế và đổi trạng thái của nó lại booked!
        $list_seats_name = $request->input('seat_name');
        foreach ($list_seats_name as $seatname) {
            // $seatname = A1 (one seatname of array list_seat_name)
            $seatchange = Seat::where('name', $seatname)->first();
            $seatchange->status = 'booked';
            $seatchange->save();
        }
        $order = Order::create([
            'order_number'            =>  'ORD-' . strtoupper(uniqid()),
            'user_id'                 =>  auth()->user()->id,
            'order_status'            =>  'pending',
            'order_grand_total'       =>  $request->get('total_price'),
            'order_item_count'        =>  $request->get('seat_tickets_count'),
            'order_payment_status'    =>  0,
            'order_payment_method'    =>  null,
            'order_first_name'        =>  $request->get('first_name'),
            'order_last_name'         =>  $request->get('last_name'),
            'order_address'           =>  $request->get('address'),
            'order_city'              =>  $request->get('city'),
            'order_country'           =>  $request->get('country'),
            'order_post_code'         =>  $request->get('post_code'),
            'order_phone_number'      =>  $request->get('tel'),
            'order_notes'             =>  $request->get('notes')
        ]);

        if ($order) {
            $film = Film::where('id',$request->get('filmID'))->first();

            $orderItem = new OrderItem([
                'order_id'  => $order->id,
                'film_id'    =>  $film->id,
                'order_item_quantity'      =>  $request->get('seat_tickets_count'),
                'order_item_price'         =>  $request->get('total_price')
            ]);

            $orderItem->save();
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message', 'Order not placed');
    }

    public function processPayment($order)
    {

        // Add shipping amount if you want to charge for shipping
        $shipping = sprintf('%0.2f', 0);
        // Add any tax amount if you want to apply any tax rule
        $tax = sprintf('%0.2f', 0);

        // Create a new instance of Payer class
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Adding items to the list
        $items = array();
        foreach ($order->items as $item) {
            $orderItems[$item->order_item_id] = new Item();
            $orderItems[$item->order_item_id]->setName($item->film->film_name)
                ->setCurrency(config('settings.currency_code'))
                ->setQuantity($item->order_item_quantity)
                ->setPrice(sprintf('%0.2f', $item->order_item_price));

            array_push($items, $orderItems[$item->order_item_id]);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        // Setting Shipping Details
        $details = new Details();
        $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal(sprintf('%0.2f', $order->order_grand_total));

        // Setup currency payment
        // Create chargeable amout
        $amount = new Amount();
        $amount->setCurrency(config('settings.currency_code'))
            ->setTotal(sprintf('%0.2f', $order->order_grand_total))
            ->setDetails($details);


        // Creating a transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($order->user->full_name)
            ->setInvoiceNumber($order->order_number);

        // This class takes two values, return URL (after successful completion where PayPal will redirect the user) and the cancel URL (if the user cancels the payment where he should be redirected).
        // Setting up redirection urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkout.payment.complete'))
            ->setCancelUrl(route('booking.book_tickets_post'));

        // Creating payment instance
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {

            $payment->create($this->payPal);
        } catch (PayPalConnectionException $exception) {
            echo $exception->getCode(); // Prints the Error Code
            echo $exception->getData(); // Prints the detailed error message
            exit(1);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();

        header("Location: {$approvalUrl}");
        exit;
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->order_status = 'processing';
        $order->order_payment_status = 1;
        $order->order_payment_method = 'PayPal - ' . $status['salesId'];
        $order->save();

        // Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
