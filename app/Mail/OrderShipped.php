<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $f_name;
    public $l_name;
    public $email;
    public $address;
    public $city;
    public $country;
    public $tel;
    public $order_item_qty;
    public $order_item_price;
    public $list_name;
    public $film_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($f,$l,$e,$a,$ci,$co, $t, $o_item_qty,$o_item_price,$li,$filmName)
    {
        $this->f_name = $f;
        $this->l_name = $l;
        $this->email = $e;
        $this->address = $a;
        $this->city = $ci;
        $this->country = $co;
        $this->tel = $t;
        $this->order_item_qty = $o_item_qty;
        $this->order_item_price = $o_item_price;
        $this->list_name = $li;
        $this->film_name = $filmName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $send_first_name = $this->f_name;
        $send_last_name = $this->l_name;
        $send_email = $this->email;
        $send_address = $this->address;
        $send_city = $this->city;
        $send_country = $this->country;
        $send_tel = $this->tel;
        $send_order_item_qty = $this->order_item_qty;
        $send_order_item_price = $this->order_item_price;
        $send_list_seats_name = $this->list_name;
        $send_film_name = $this->film_name;
        return $this->view('site.pages.mail.send_email')
        ->with([
            'send_first_name' => $this->f_name,
            'send_last_name' => $this->l_name,
            'send_email'  => $this->email,
            'send_address'  => $this->address,
            'send_city'  => $this->city,
            'send_country'  => $this->country,
            'send_tel'  => $this->tel,
            'send_order_item_qty'  => $this->order_item_qty,
            'send_order_item_price'  => $this->order_item_price,
            'send_list_seats_name'  => $this->list_name,
            'send_film_name'  => $this->film_name,
        ]);
    }
}
