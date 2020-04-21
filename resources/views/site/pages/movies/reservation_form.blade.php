@extends('site.app2')

@section('title')
{{$pageTitle}}
@endsection
@section('banner_content')
@foreach ($info_film as $row)
@foreach ($row->film_using_pivot_schedules as $film)
<h3 class="title">{{$film->film_name}}</h3>
<div class="tags">
    <a href="#0">{{$film->duration}} mins</a>
    <a href="#0">{{$film->language}}</a>
</div>
@endforeach

@endforeach
@endsection
@section('page-title-content')
<span class="date">{{date('l', strtotime($today))}}, {{date('d', strtotime($today))}} month
    {{date('m', strtotime($today))}} year {{date('Y', strtotime($today))}}</span>
<select class="select-bar">
    @foreach ($list_times as $schedules)
    @foreach ($schedules->schedule_film as $time)

    @foreach ($info_film as $film)
    @foreach ($film->film_using_pivot_schedules as $schedule)
    @if ($schedule->pivot->start_time == $time->start_time)
    <option value="sc1" selected>{{date('d/m/Y h:i A', strtotime($time->start_time)) }}</option>
    @else
    <option value="sc1">{{date('d/m/Y h:i A', strtotime($time->start_time)) }}</option>
    @endif
    @endforeach
    @endforeach


    @endforeach
    @endforeach
</select>
@endsection
@section('content')
<div class="col-lg-8">
    <div class="checkout-widget d-flex flex-wrap align-items-center justify-cotent-between">
        <div class="title-area">
            <h5 class="title">Already a Boleto Member?</h5>
            <p>Sign in to earn points and make booking easier!</p>
        </div>
        <a href="{{route('register')}}" class="sign-in-area">
            <i class="fas fa-user"></i><span>Sign in</span>
        </a>
    </div>
    <div class="checkout-widget checkout-card mb-0">
        <h5 class="title">Share your Contact Details </h5>
    </div>
    <div class="checkout-widget checkout-card mb-0">
        <h5 class="title">Payment Option </h5>
        <ul class="payment-option">
            <li class="active">
                <a href="#0">
                    <img src="{{asset('assets_client/images/payment/card.png')}}" alt="payment">
                    <span>Debit Card</span>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{asset('assets_client/images/payment/paypal.png')}}" alt="payment">
                    <span>paypal</span>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{asset('assets_client/images/payment/card.png')}}" alt="payment">
                    <span>Credit Card</span>
                </a>
            </li>
        </ul>
        <h6 class="subtitle">Enter Your Card Details </h6>
        <form class="payment-card-form" method="POST" action="{{route('checkout.place.order')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="first_name" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" placeholder="Last Name">
            </div>
            <div class="form-group">
            <input type="text" name="email" placeholder="Enter your Mail" value="{{ auth()->user()->email }}" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="tel" placeholder="Enter your Phone Number ">
            </div>
            <div class="form-group">
                <input type="text" name="post_code" placeholder="Enter your Post Code ">
            </div>
            <div class="form-group">
                <input type="text" name="notes" placeholder="Enter your Notes ">
            </div>
            <div class="form-group">
                <input type="text" name="address" placeholder="Enter your Address ">
            </div>
            <div class="form-group">
                <input type="text" name="city" placeholder="Enter your City ">
            </div>
            <div class="form-group">
                <input type="text" name="country" placeholder="Enter your Country ">
            </div>
            <div class="form-group">
                <input type="hidden" name="total_price" id="total_price" value="">
                @foreach ($info_film as $row)
                @foreach ($row->film_using_pivot_schedules as $film)
                    <input type="hidden" name="filmID" id="filmID" value="{{$film->id}}">
                @endforeach
                @endforeach
                @foreach ($list_seatname as $item)
                    <input type="hidden" name="seat_name[]" value="{{$item}}">
                @endforeach
                <input type="hidden" name="seat_tickets_count" id="seat_tickets_count" value="{{count(collect($list_seatname))}}">
                <input type="submit" class="custom-button" value="make payment">
            </div>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>

            <!-- Include the PayPal JavaScript SDK -->
            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

            <script>
                // Render the PayPal button into #paypal-button-container
                    paypal.Buttons({
            
                        // Set up the transaction
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: '0.01'
                                    }
                                }]
                            });
                        },
            
                        // Finalize the transaction
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                // Show a success message to the buyer
                                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            });
                        }
            
            
                    }).render('#paypal-button-container');
            </script>
        </form>
        <p class="notice">
            By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
        </p>
    </div>
</div>
<div class="col-lg-4">
    <div class="booking-summery bg-one">
        <h4 class="title">booking summery</h4>
        @foreach ($info_film as $row)
        @foreach ($row->film_using_pivot_schedules as $film)
        <ul>
            <li>
                <h6 class="subtitle">{{$film->film_name}}</h6>
                <span class="info">{{$film->language}}</span>
            </li>
            <li>
                <h6 class="subtitle"><span>{{$film->brand->name}}</span><span>0{{count(collect($list_seatname))}}</span>
                </h6>
                <div class="info"><span>{{date('d/m/Y h:i A', strtotime($today)) }}</span> <span>Tickets</span></div>

            </li>
            <li>
                <h6 class="subtitle mb-0"><span>Tickets Price</span><span id="totalPriceSeat">{{$totalPrice}}</span>
                </h6>
            </li>
            <li>
                <h6 class="subtitle mb-0"><span>List Seat Name:</span>
                    @foreach ($list_seatname as $item)
                        <span>{{$item}}</span>
                    @endforeach
                </h6>
            </li>
        </ul>
        <ul class="side-shape">
            <li>
                @forelse ($foods as $food)
                <h6 class="subtitle"><span>{{$food->categoryfood->cof_name}}</span><span
                        id="totalPriceFood">{{$totalPriceFood}}</span></h6>

                <span class="info"><span>{{$food->f_name}} </span></span>
                @empty
                <p>No food not found</p>
                @endforelse
            </li>
            <li>
                <h6 class="subtitle"><span>food & bevarage</span></h6>
            </li>
        </ul>
        @endforeach
        @endforeach
    </div>
    <div class="proceed-area  text-center">
        <h6 class="subtitle"><span>Amount Payable</span><span id="price"></span></h6>
    </div>
</div>

<script>
    var totalPrice = document.getElementById('totalPriceSeat').innerHTML;
    if(totalPriceFood == null || totalPriceFood == "")
    {
        totalPriceFood = 0;

        var totalPrice = totalPrice.replace('$','');
        
        document.getElementById('price').innerHTML = (parseFloat(totalPrice) + parseFloat(totalPriceFood));
        
        document.querySelector('input[name="total_price"]').value = (parseFloat(totalPrice) + parseFloat(totalPriceFood));
    }else {
        var totalPriceFood = document.getElementById('totalPriceFood').innerHTML;

        var totalPrice = totalPrice.replace('$','');

        document.getElementById('price').innerHTML = (parseFloat(totalPrice) + parseFloat(totalPriceFood));

        document.querySelector('input[name="total_price"]').value = (parseFloat(totalPrice) + parseFloat(totalPriceFood));
    }
    
</script>

@endsection