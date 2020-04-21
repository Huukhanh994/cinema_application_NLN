<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:20:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('site.partials.css')
    <link href="{{asset('/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- page css -->
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
    <title>Booking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .seat {
            float: left;
            display: block;
            margin: 5px;
            background: #4CAF50;
            /* green */
            width: 50px;
            height: 50px;
        }

        .empty {
            float: left;
            display: block;
            margin: 5px;
            width: 50px;
            height: 50px;
        }

        .seat-select {
            display: none;
        }

        .seat-select:checked+.seat {
            background: #F44336;
            /* red */
        }

        label.occuped {
            background: #F44336;
            /* red */
        }

        .cinemaHall {
            margin: auto;
            width: 51%;
            height: 62%;
            border: 1px solid #ddd;
        }

        .available {
            background-color: #96c131;
        }

        .hovering {
            background-color: #ae59b3;
        }

        .selected {
            background-color: red;
        }
        label.booked{
            background: red;
        }
    </style>
</head>

<body>
    <!-- ==========Preloader========== -->
    @include('site.partials.preloader')
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    @include('site.partials.header')
    <section class="details-banner hero-area bg_img seat-plan-banner"
        data-background="{{asset('assets_client/images/banner/banner04.jpg')}}">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    @foreach ($info_film as $room)
                    @foreach ($room->film_using_pivot_schedules as $film)
                    <h3 class="title">{{$film->film_name}}</h3>
                    <div class="tags">
                        <a href="#0">{{$film->duration}} mins</a>
                        <a href="#0">{{$film->language}}</a>
                    </div>
                    @endforeach

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <section class="page-title bg-one">
        <div class="container">
            <div class="page-title-area">
                <div class="item md-order-1">
                    <a href="{{route('movies.now_showing')}}" class="custom-button back-button">
                        <i class="flaticon-double-right-arrows-angles"></i>back
                    </a>
                </div>
                <div class="item date-item">
                    {{-- @foreach ($info_film as $room)
                            @foreach ($room->film_using_pivot_schedules as $film)
                                <span class="date">{{date('l', strtotime($film->pivot->start_time))}},
                    {{date("d",strtotime($film->pivot->start_time))}} month
                    {{date("m",strtotime($film->pivot->start_time))}} year
                    {{date("Y",strtotime($film->pivot->start_time))}}</span>
                    @endforeach
                    @endforeach --}}
                    <span class="date">{{date('l', strtotime($dateToday))}}, {{date('d', strtotime($dateToday))}} month
                        {{date('m', strtotime($dateToday))}} year {{date('Y', strtotime($dateToday))}}</span>
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
                </div>
                <div class="item">
                    <h5 class="title">05:00</h5>
                    <p>Mins Left</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="seat-plan-section padding-bottom padding-top">
        <div class="container">
            <form name="myForm" action="{{route('booking.book_tickets_post')}}" method="post" onsubmit="validate()">
                @csrf
                <div class="screen-area">
                    <h4 class="screen">screen</h4>
                    <div class="screen-thumb">
                        <img src="{{asset('assets_client/images/movie/screen-thumb.png')}}" alt="movie">
                    </div>
                    <h5 class="subtitle">single plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            @foreach ($info_film as $film)
                            @if ($film->seats[0]->row)
                            <li class="seat-line">
                                <span>{{$film->seats[0]->row}}</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            @foreach ($film->seats as $seat)
                                            @if ($seat->row == 'A')
                                            <li class="single-seat seat-free">
                                                <input id="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                    data-price="{{$seat->categoryseat->cos_price}}" class="seat-select" <?php if($seat->status == 'booked') echo 'disabled'; ?>
                                                    type="checkbox" name="seat[]" value="{{$seat->name}}"
                                                    type="checkbox" onclick="totalIt()" />
                                                <label for="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                    class="seat <?php if($seat->status == 'booked') echo 'booked'; ?>">{{$seat->name}}</label>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="seat-line">
                                <span>{{$film->seats[12]->row}}</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            @foreach ($film->seats as $seat)
                                            @if ($seat->row == 'B')
                                            <li class="single-seat seat-free">
                                                {{-- <img src="/assets_client/images/movie/seat01-free.png" alt="seat" data-seat="{{$seat->name}}"
                                                data-price="{{$seat->categoryseat->cos_price}}">
                                                <span class="sit-num">{{$seat->name}}</span> --}}
                                                <input id="seat-{{$seat->id}}" data-seat="{{$seat->name}}" <?php if($seat->status == 'booked') echo 'disabled'; ?>
                                                    data-price="{{$seat->categoryseat->cos_price}}" class="seat-select"
                                                    type="checkbox" name="seat[]" value="{{$seat->name}}"
                                                    type="checkbox" onclick="totalIt()" />
                                                <label for="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                    class="seat <?php if($seat->status == 'booked') echo 'booked'; ?>">{{$seat->name}}</label>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>

                    </div>
                    <h5 class="subtitle">couple plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area couple">
                            @foreach ($seat_couple as $film)
                            <li class="seat-line">
                                <span>J</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            @foreach ($film->seats as $seat)
                                            @if ($seat->row == 'J')
                                            <li class="single-seat seat-free">
                                                <input id="seat-{{$seat->id}}" data-index="{{$seat->seat_number}}"
                                                    data-seat="{{$seat->name}}"
                                                    data-price="{{$seat->categoryseat->cos_price}}-{{$seat->seat_number}}" class="seat-select" <?php if($seat->status == 'booked') echo 'disabled'; ?>
                                                    type="checkbox" name="seat[]" value="{{$seat->name}}"
                                                    type="checkbox" onclick="totalIt(this); coupleFunction(this)" />
                                                <label for="seat-{{$seat->id}}" data-index="{{$seat->seat_number}}"
                                                    data-seat="{{$seat->name}}" class="seat <?php if($seat->status == 'booked') echo 'booked'; ?>">{{$seat->name}}</label>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <span>J</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="proceed-book bg_img"
                    data-background="{{asset('assets_client/images/movie/movie-bg-proceed.jpg')}}">
                    <div class="proceed-to-book">
                        <div class="book-item">
                            <span>You have Choosed Seat</span>
                            <h3 class="title" id="input_seat_name"></h3>
                        </div>
                        <div class="book-item">
                            <span>total price</span>
                            <input class="title" value="0$" readonly="readonly" type="text" id="total"
                                name="totalPrice"></input>
                        </div>
                        <div class="book-item">
                            @foreach ($info_film as $film)
                            @foreach ($film->film_using_pivot_schedules as $item)
                            <input type="hidden" name="filmID" value="{{$item->id}}">
                            @endforeach
                            @endforeach

                            <input type="hidden" name="roomID" value="{{$roomID}}">
                            <input type="hidden" name="dateToday" value="{{$dateToday}}">
                            <input type="hidden" name="foodID" id="food_id" value="">
                            <input type="hidden" name="qty_food" value="">
                            <input type="hidden" id="total_price_food" name="total_price_food" value="">
                            <a href="#" id="addFood" data-toggle="modal" data-target=".bd-example-modal-lg">add food</a>
                            <button type="submit" class="custom-button">proceed</button>
                        </div>
                    </div>
                    <div class="proceed-to-book">
                        <div class="book-item">
                            <div class="book-item">
                                <span>You have Choosed Food:</span>
                                <span class="title" id="food_choosed"></span>
                                <ul class="list-group" style="color: black;">
                                    <li class="list-group-item">Food name: <p id="food_add_name" style="color: black;"></p> </li>
                                    <li class="list-group-item">Food quantity: <p id="food_add_qty" style="color: black;"></p></li>
                                    <li class="list-group-item">Food Price for each food: <p id="food_add_price" style="color: black;"></p></li>
                                    <li class="list-group-item">Total price of foods: <p class="title" id="food_add_totalPrice"> </p></li>                                    
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg"
                style="overflow-y: scroll; max-height:85%; max-width:1220px;  margin-top: 50px; margin-bottom:50px;">
                <div class="modal-content" style="color: black; height:350vh;font-family: 'Open Sans', sans-serif;
                    background: #001232;">
                    <div class="modal-header">
                        <h3 class="modal-title">Let's your choose the food movie</h3>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="c-thumb padding-bottom">
                                    <img src="{{asset('assets_client/images/sidebar/banner/banner04.jpg')}}"
                                        alt="sidebar/banner">
                                </div>
                                <div class="section-header-3">
                                    <span class="cate">You're hungry</span>
                                    <h2 class="title">we have food</h2>
                                    <p>Prebook Your Meal and Save More!</p>
                                </div>
                                <div class="grid--area">
                                    <ul class="filter">
                                        <li data-filter="*" class="active">all</li>
                                    </ul>
                                    <div class="grid-area">
                                        @foreach ($foods as $food)
                                        <div class="grid-item bevarage">
                                            <div class="grid-inner">
                                                <div class="grid-thumb">
                                                    <img src="{{asset('assets_client/images/movie/popcorn/pop3.png')}}"
                                                        alt="movie/popcorn">
                                                    <div class="offer-tag">
                                                        {{$food->f_price}}
                                                    </div>
                                                    <div class="offer-remainder">
                                                        <h6 class="o-title mt-0">24%</h6>
                                                        <span>off</span>
                                                    </div>
                                                </div>
                                                <div class="grid-content">
                                                    <h5 class="subtitle">
                                                        <a href="#0">
                                                            {{$food->f_name}}
                                                        </a>
                                                    </h5>
                                                    <form  class="cart-button">
                                                        <div class="cart-plus-minus">
                                                            {{-- <input class="cart-plus-minus-box" id="qty_food"
                                                                type="number" name="qty_food" value="2"> --}} 
                                                            <input type="number" name="qty_food" id="qty_food-{{$food->f_id}}" value="2">
                                                            <input type="hidden" name="food_price" id="food_price-{{$food->f_id}}" value="{{$food->f_price}}">
                                                        </div>
                                                        @foreach ($info_film as $film)
                                                        @foreach ($film->film_using_pivot_schedules as $item)
                                                        <input type="hidden" name="filmID" id="film_id" value="{{$item->id}}">
                                                        @endforeach
                                                        @endforeach
                                                        <input type="hidden" name="roomID" id="room_id" value="{{$roomID}}">
                                                        <input type="hidden" name="dateToday" id="data_today" value="{{$dateToday}}">
                                                        <input type="hidden" name="food_name" value="{{$food->f_name}}">
                                                        <button type="button" class="tst3 custom-button" id="submit"
                                                            data-food_id="{{$food->f_id}}"
                                                            data-food_name="{{$food->f_name}}"
                                                            data-food_price="{{$food->f_price}}"
                                                            onclick="addFood(this)">
                                                            add
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- ==========Movie-Section========== -->
    @include('site.partials.footer')
    <!-- ==========Newslater-Section========== -->


    @include('site.partials.js')
    <script>
        var array_seat_name = [];
        var total_temp = 0;
           function totalIt(d) {
               var total = 0;
                var input = document.getElementsByName("seat[]");
                for (var i = 0; i < input.length; i++) {
                    if (input[i].checked) {
                        total += parseFloat(input[i].getAttribute('data-price'));
                    }
                }
                document.getElementById('total').value = total.toFixed(1) + "$";
                return total_temp = total.toFixed(1);
            }
            
            function coupleFunction(d)
            {
                const seatID = d.getAttribute("data-index");   
                const currentSeat = $(`input[data-index="${seatID}"]`);       
                const currentPriceSeat = d.getAttribute("data-price");
                if(seatID % 2 == 1) {
                    const nextSeat = Number.parseInt(seatID) + 1;
                    const nextSeatElement = $(`label[data-index="${nextSeat}"]`);
                    array_seat_name.push(nextSeatElement.html())
                    document.getElementById('input_seat_name').innerHTML = array_seat_name;
                    document.getElementById('total').value = total_temp;
                    if(!nextSeatElement.hasClass("selected")) {
                        nextSeatElement.addClass("selected");
                    } else {
                        array_seat_name.pop(currentSeat);
                        array_seat_name.pop();
                        const tempt = document.getElementById('total').value;
                        document.getElementById('input_seat_name').innerHTML = array_seat_name;
                        nextSeatElement.removeClass("selected");
                    }
                } else if(seatID%2 == 0) {
                    const prevSeat = Number.parseInt(seatID) - 1;
                    const prevSeatElement = $(`label[data-index="${prevSeat}"]`);
                    array_seat_name.push(prevSeatElement.html())
                    document.getElementById('input_seat_name').innerHTML = array_seat_name;
                    if(!prevSeatElement.hasClass("selected")) {
                        prevSeatElement.addClass("selected");
                    } else {
                        array_seat_name.pop(currentSeat);
                        array_seat_name.pop();
                        document.getElementById('input_seat_name').innerHTML = array_seat_name;
                        prevSeatElement.removeClass("selected");
                    }
                }
            }
            $(document).ready(function () {
                
                $('.seat').on('click',function(){ 
                    if($(this).hasClass("selected")){
                        array_seat_name.pop();
                        document.getElementById('input_seat_name').innerHTML = array_seat_name;
                        $(this).removeClass("selected");                  
                    }else{  
                        var seatName = $(this).attr('data-seat');
                        array_seat_name.push(seatName);
                        document.getElementById('input_seat_name').innerHTML = array_seat_name;                 
                        $(this).addClass("selected");
                    }

                });

                $('.seat').mouseenter(function(){     
                    $(this).addClass("hovering");

                    $('.seat').mouseleave(function(){ 
                    $(this).removeClass("hovering");
                        
                    });
                });
               
                 
            });

        
        var array_food_names = [];
        var array_food_qty = [];
        var array_food_price_each = [];
        function addFood(d) {   
            // ID Food
            var foodID = d.getAttribute("data-food_id");
            // Quantity of that food
            var qtyFood = $('#qty_food-'+foodID).val();
            var priceFood = $('#food_price-'+foodID).val();
            // var priceEachFood = (parseInt(priceFood) * parseInt(qtyFood));
    
            // array_food_qty.push(qtyFood);
            // var totalQty = 0;
            // for(var i = 0; i < array_food_qty.length; i++)
            // {
            //     totalQty += parseInt(array_food_qty[i]);    
            // }
            var foodName = d.getAttribute('data-food_name');
            // array_food_names.push(foodName);
            var foodPrice = d.getAttribute('data-food_price');
            var totalPriceFood = (parseInt(foodPrice) * parseInt(qtyFood));


            // # VIEW render to show client
            document.getElementById('food_add_name').innerHTML = foodName;
            document.getElementById('food_add_qty').innerHTML = qtyFood;
            document.getElementById('food_add_price').innerHTML = foodPrice;
            document.getElementById('food_add_totalPrice').innerHTML = totalPriceFood;
            document.getElementById('food_choosed').innerHTML = foodName + "-" + foodPrice + "-" + qtyFood;
            

            // # pass into input hidden to controller get to handle
            document.querySelector('input[name=foodID]').value = foodID;
            document.querySelector('input[name="qty_food"]').value = qtyFood;
            document.querySelector('input[name="total_price_food"]').value = totalPriceFood;
        }
    
    </script>
    <!--Custom JavaScript -->
    <script src="{{asset('/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script>
        $(function() {
            "use strict";
            $(".tst3").click(function(){
            $.toast({
                heading: 'Add the food successfully!',
                text: 'This food has been added successfully!',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
            
            });
        });
    </script>
    {{-- <script src="{{asset('dist/js/pages/toastr.js')}}"></script> --}}
</body>

<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:22:02 GMT -->

</html>