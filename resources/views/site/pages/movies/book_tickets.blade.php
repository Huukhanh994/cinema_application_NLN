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
        .smallBox::before
        {
        content:".";
        width:15px;
        height:15px;
        float:left;
        margin-right:10px;
        }
        .greenBox::before
        {
        content:"";
        background:#F44336;
        }
        .redBox::before
        {
        content:"";
        background:red;
        }
        .emptyBox::before
        {
        content:"";
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:#4CAF50;
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
            <form name="myForm" action="{{route('booking.book_tickets_post')}}" method="post">
                @csrf
                <div class="screen-area">
                    <h4 class="screen">screen</h4>
                    <div class="screen-thumb">
                        <img src="{{asset('assets_client/images/movie/screen-thumb.png')}}" alt="movie">
                    </div>
                    <h5 class="subtitle">single plus</h5>
                    <div class="row">
                        <div class="screen-wrapper col-md-10" style="position: relative; left: 7%;">
                            <ul class="seat-area">
                                @foreach ($info_film as $film)
                        
                                <li class="seat-line">
                                    @foreach ($seats as $item)
                                    @foreach ($item->seats as $seat)
                                    @if ($seat->row === 'A')
                                    <span>{{$seat->row}}</span>
                                    @endif
                                    @endforeach
                                    @endforeach
                        
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                @foreach ($film->seats as $seat)
                                                @if ($seat->row == 'A')
                                                <li class="single-seat seat-free">
                                                    <input id="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                        data-price="{{$seat->categoryseat->cos_price}}" class="seat-select"
                                                        <?php if($seat->status == 'booked') echo 'disabled'; ?> type="checkbox" name="seat[]"
                                                        value="{{$seat->name}}" type="checkbox" onclick="totalIt()" />
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
                                    @foreach ($seats as $item)
                                    @foreach ($item->seats as $seat)
                                    @if ($seat->row === 'B')
                                    <span>{{$seat->row}}</span>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                @foreach ($film->seats as $seat)
                                                @if ($seat->row == 'B')
                                                <li class="single-seat seat-free">
                                                    {{-- <img src="/assets_client/images/movie/seat01-free.png" alt="seat" data-seat="{{$seat->name}}"
                                                    data-price="{{$seat->categoryseat->cos_price}}">
                                                    <span class="sit-num">{{$seat->name}}</span> --}}
                                                    <input id="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                        <?php if($seat->status == 'booked') echo 'disabled'; ?>
                                                        data-price="{{$seat->categoryseat->cos_price}}" class="seat-select" type="checkbox"
                                                        name="seat[]" value="{{$seat->name}}" type="checkbox" onclick="totalIt()" />
                                                    <label for="seat-{{$seat->id}}" data-seat="{{$seat->name}}"
                                                        class="seat <?php if($seat->status == 'booked') echo 'booked'; ?>">{{$seat->name}}</label>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                        
                                @endforeach
                            </ul>
                        
                        </div>
                        <div class="col-md-2">
                            <td rowspan="20">
                                <div class="smallBox greenBox">Selected Seat</div> <br />
                                <div class="smallBox redBox">Reserved Seat</div><br />
                                <div class="smallBox emptyBox">Empty Seat</div><br />
                            </td>
                        </div>
                    </div>
                    <h5 class="subtitle">couple plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area couple">
                            @if (isset($seat_couple))
                                @foreach ($seat_couple as $film)
                                <li class="seat-line">
                                    @foreach ($seats as $item)
                                        @foreach ($item->seats as $seat)
                                            @if ($seat->row === 'J')
                                                <span>{{$seat->row}}</span>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                @foreach ($film->seats as $seat)
                                                @if ($seat->row == 'J')
                                                <li class="single-seat seat-free">
                                                    <input id="seat-{{$seat->id}}" data-index="{{$seat->seat_number}}" data-seat="{{$seat->name}}"
                                                        data-price="{{$seat->categoryseat->cos_price}}-{{$seat->seat_number}}" class="seat-select"
                                                        <?php if($seat->status == 'booked') echo 'disabled'; ?> type="checkbox" name="seat[]"
                                                        value="{{$seat->name}}" type="checkbox" onclick="totalIt(this); coupleFunction(this)" />
                                                    <label for="seat-{{$seat->id}}" data-index="{{$seat->seat_number}}" data-seat="{{$seat->name}}"
                                                        class="seat <?php if($seat->status == 'booked') echo 'booked'; ?>">{{$seat->name}}</label>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>J</span>
                                </li>
                                @endforeach
                            @endif
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
                            <input class="title" value="0" readonly="readonly" type="text" id="total"
                            name="totalPrice">              {{-- TODO: Tổng giá tiền của các vé phim --}}
                        </div>
                        <div class="book-item">
                            {{-- # PART OF FILM --}}
                            @foreach ($info_film as $film)
                            @foreach ($film->film_using_pivot_schedules as $item)
                                <input type="hidden" name="filmID" value="{{$item->id}}">
                            @endforeach
                            @endforeach
                            {{-- Rạp của phim đang chiếu --}}
                            {{-- @foreach ($clusterNameOfRoom as $room)
                                <input type="hidden" name="clusterName" value="{{$room->cluster->cluster_name}}">
                            @endforeach --}}
                            {{-- Phòng của phim --}}
                            <input type="hidden" name="roomID" value="{{$roomID}}">
                            {{-- Ngày chọn để đặt vé --}}
                            <input type="hidden" name="dateToday" value="{{$dateToday}}">

                            {{-- # Part of Foods GỌI TỪ JAVASCRIPT Ở JS LÊN--}}
                            <div id="part_foods">

                            </div>
                            <a href="#" id="addFood" data-toggle="modal" data-target=".bd-example-modal-lg">add food</a>
                            <button type="submit" class="custom-button">proceed</button>
                        </div>
                    </div>
                    <div class="proceed-to-book">
                        <div class="book-item">
                            {{-- <div class="book-item">
                                <span>You have Choosed Food:</span>
                                <span class="title" id="food_choosed"></span>
                                <ul class="list-group" style="color: black;">
                                    <li class="list-group-item">Food name: <p id="food_add_name" style="color: black;"></p> </li>
                                    <li class="list-group-item">Food quantity: <p id="food_add_qty" style="color: black;"></p></li>
                                    <li class="list-group-item">Food Price for each food: <p id="food_add_price" style="color: black;"></p></li>
                                    <li class="list-group-item">Total price of foods: <p class="title" id="food_add_totalPrice"> </p></li>                                    
                                </ul>
                            </div> --}}
                            <div class="book-item">
                                <div id="show_table_foods">

                                </div>
                                <div id="show_sum_foods">

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
        {{-- ADD FOOD --}}
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
                                                        </div>
                                                        @foreach ($info_film as $film)
                                                        @foreach ($film->film_using_pivot_schedules as $item)
                                                        <input type="hidden" name="filmID" id="film_id" value="{{$item->id}}">
                                                        @endforeach
                                                        @endforeach
                                                        <input type="hidden" name="roomID" id="room_id" value="{{$roomID}}">
                                                        <input type="hidden" name="dateToday" id="data_today" value="{{$dateToday}}">
                                                        <input type="hidden" name="food_name" value="{{$food->f_name}}">

                                                        {{-- # Food --}}
                                                        <input type="hidden" name="food_name" id="food_name-{{$food->f_id}}" value="{{$food->f_name}}">
                                                        <input type="hidden" name="food_price" id="food_price-{{$food->f_id}}" value="{{$food->f_price}}">
                                                        <button type="button" class="tst3 custom-button" id="submit"
                                                            data-food_id="{{$food->f_id}}"
                                                            data-food_name="{{$food->f_name}}"
                                                            data-food_price="{{$food->f_price}}"
                                                            onclick="addFood(this); addEachFood(this);">
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
                document.getElementById('total').value = total.toFixed(1);
                return total_temp = total.toFixed(1);
            }
            
            // TODO: XỬ LÝ GHẾ COUPLE KHI CLICK
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
       
        // # array save foods
        var foods = [];
        // NEWS: thêm nhìu thức ăn nc uống Object in array
        function addEachFood(d)
        {
            // # object of each foods such as: drink, food
            var ob_food = {
                id: "",
                food_name: "",
                qty: "",
                price: "",
            };
            // # save all of values of foods
            var foodID = d.getAttribute("data-food_id");
            const foodName = document.getElementById('food_name-'+foodID).value;
            const foodQty = document.getElementById('qty_food-'+foodID).value;
            const foodPrice = document.getElementById('food_price-'+foodID).value;

            // # DONT USE
            array_food_names.push(foodName);
            array_food_qty.push(foodQty);
            var totalQty = 0;
            for(var i = 0; i < array_food_qty.length; i++)
            {
                totalQty += parseInt(array_food_qty[i]);    
            }
            
            ob_food["id"] = foodID;
            ob_food["food_name"] = foodName;
            ob_food["qty"] = foodQty;
            ob_food["price"] = foodPrice;
            foods.push(ob_food);
            
            var render_foods = "<table class='table table-striped' style='background-color: white;'>";
                                render_foods += "<thead>";
                                    render_foods +="<tr>";
                                    render_foods +="<th scope='col'>#</th>";
                                    render_foods +="<th scope='col'>Food Name</th>";
                                    render_foods +="<th scope='col'>Food Qty</th>";
                                    render_foods +="<th scope='col'>Each price</th>";
                                    render_foods +="<th scope='col'>Total price</th>";
                                    render_foods +="<th scope='col'>Action</th>";
                                    render_foods +="</tr>";
                                render_foods +="</thead>";
                                render_foods +="<tbody>";
                foods.forEach(foodChild => {
                render_foods +="<tr>";
                    render_foods +="<th scope='row'>"+foodChild.id+"</th>";
                    render_foods +="<td>"+foodChild.food_name+"</td>";
                    render_foods +="<td>"+foodChild.qty+"</td>";
                    render_foods +="<td>@"+foodChild.price+"</td>";
                    render_foods +="<td>#"+(parseFloat(foodChild.qty) * parseFloat(foodChild.price)).toFixed(1)+"</td>";
                    render_foods +='<td><a href="#" id="'+foodChild.id+'" onclick="removeFoodChild(this.id)"><i class="fas fa-trash-alt"></i></a></td>';
                    render_foods +="</tr>"
                });
                render_foods += "</tbody>";
                render_foods += "</table>";
                
                $('#show_table_foods').html(render_foods);


            //  truy cập đến field food_name in object into array JS
            let resultFoodName = foods.map( ({ food_name }) => food_name);
            // console.log(resultFoodName);
            let resultQtyFood = foods.map(  ({ qty }) => qty)
            // console.log(resultQtyFood);
            let result = foods.map(({ id, food_name, qty, price }) => ({id,food_name, qty, price}));
            // console.log(result);

            var amout_payment = 0.0;
            var total_price = 0.0;
            var totalQty = 0;
            var array_foodID = [];
            var array_name = [];
            // var render_sum_foods = '<ul class="list-group" style="color: black;">'
            for(var j = 0; j < result.length; j++)
            {
                // console.log(result[j].price);
                // console.log(total_price += parseFloat(result[j].price));
                
                array_name.push(result[j].food_name);
                totalQty += parseInt(result[j].qty);
                total_price += parseFloat(result[j].price);
                amout_payment += parseFloat(result[j].qty) * parseFloat(result[j].price);
                array_foodID += result[j].id + ",";
                // console.log(amout_payment);
                // render_sum_foods += '<li class="list-group-item">Food name: <p id="food_add_name" style="color: black;">'+array_name+'</p>';
                //     render_sum_foods +='</li>';
                // render_sum_foods +='<li class="list-group-item">Food quantity: <p id="food_add_qty" style="color: black;">'+totalQty+'</p>';
                //     render_sum_foods +='</li>';
                // render_sum_foods +='<li class="list-group-item">Total price of foods: <p class="title">'+total_price+'</p>';
                //     render_sum_foods +='</li>';
            }
            // render_sum_foods += '</ul>';
            // $('#show_sum_foods').html(render_sum_foods);
            var foodID = array_foodID.toString();
            // console.log(test.replace(/,\s*$/, ""));
            var render_sum_foods = '<ul class="list-group" style="color: black;">'
                render_sum_foods += '<li class="list-group-item">Food name: <p id="food_add_name" style="color: black;">'+array_name+'</p>';
                    render_sum_foods +='</li>';
                render_sum_foods +='<li class="list-group-item">Food quantity: <p style="color: black;">'+totalQty+'</p>';
                    render_sum_foods +='</li>';
                render_sum_foods +='<li class="list-group-item">Amout payment: <p class="title">'+amout_payment.toFixed(1)+'</p>';
                    render_sum_foods +='</li>';
            render_sum_foods += '</ul>';

            $('#show_sum_foods').html(render_sum_foods);
                
            
            var part_food = '<input type="hidden" name="foodID[]" id="food_id" value="'+foodID.replace(/,\s*$/, "")+'">'
                part_food += '<input type="hidden" name="foodName[]" id="food_name" value="'+array_name+'">';
                part_food +='<input type="hidden" name="qty_food" value="'+totalQty+'">';
                part_food +='<input type="hidden" id="total_price_food" name="total_price_food" value="'+amout_payment+'">';
           
            $('#part_foods').html(part_food);
        }
       // # remove foods after you select food on top
       function removeFoodChild(food_id)
        {
            foods = foods.slice(0, foods.length - 1);       // foods.pop() remove last element from array
            // foods.splice(food_id, 1);        // remove this position of array
                var render_foods = "<table class='table table-striped' style='background-color: white;'>";
                    render_foods += "<thead>";
                        render_foods +="<tr>";
                            render_foods +="<th scope='col'>#</th>";
                            render_foods +="<th scope='col'>Food Name</th>";
                            render_foods +="<th scope='col'>Food Qty</th>";
                            render_foods +="<th scope='col'>Each price</th>";
                            render_foods +="<th scope='col'>Total price</th>";
                            render_foods +="<th scope='col'>Action</th>";
                            render_foods +="</tr>";
                        render_foods +="</thead>";
                    render_foods +="<tbody>";


                        foods.forEach(foodChild => {
                        render_foods +="<tr>";
                            render_foods +="<th scope='row'>"+foodChild.id+"</th>";
                            render_foods +="<td>"+foodChild.food_name+"</td>";
                            render_foods +="<td>"+foodChild.qty+"</td>";
                            render_foods +="<td>@"+foodChild.price+"</td>";
                            render_foods +="<td>#"+(parseFloat(foodChild.qty) * parseFloat(foodChild.price)).toFixed(1)+"</td>";
                            render_foods +='<td><a href="#" id="'+foodChild.id+'" onclick="removeFoodChild(this.id)"><i class="fas fa-trash-alt"></i></a></td>';
                            render_foods +="</tr>"
                        });
                        render_foods += "</tbody>";
                    render_foods += "</table>";

                $('#show_table_foods').html(render_foods);
            return false;
        }
        // OLD: 
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
            // document.getElementById('food_add_name').innerHTML = foodName;
            // document.getElementById('food_add_qty').innerHTML = qtyFood;
            // document.getElementById('food_add_price').innerHTML = foodPrice;
            // document.getElementById('food_add_totalPrice').innerHTML = totalPriceFood;
            // document.getElementById('food_choosed').innerHTML = foodName + "-" + foodPrice + "-" + qtyFood;
            

            // # pass into input hidden to controller get to handle
            // document.querySelector('input[name=foodID]').value = foodID;
            // document.querySelector('input[name="qty_food"]').value = qtyFood;
            // document.querySelector('input[name="total_price_food"]').value = totalPriceFood;
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