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
<div class="row">
    <div class="col-lg-8">
        <div class="c-thumb padding-bottom">
            <img src="{{asset('assets_client/images/sidebar/banner/banner04.jpg')}}" alt="sidebar/banner">
        </div>
        <div class="section-header-3">
            <span class="cate">You're hungry</span>
            <h2 class="title">we have food</h2>
            <p>Prebook Your Meal and Save More!</p>
        </div>
        <div class="grid--area">
            <ul class="filter">
                <li data-filter="*" class="active">all</li>
                <li data-filter=".combos">combos</li>
                <li data-filter=".bevarage">bevarage</li>
                <li data-filter=".popcorn">popcorn</li>
            </ul>
            <div class="grid-area">
                @foreach ($foods as $food)
                @if ($food->coff_id == 1)
                <div class="grid-item bevarage">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="{{asset('assets_client/images/movie/popcorn/pop2.png')}}" alt="movie/popcorn">
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
                            <form class="cart-button">
                                <div class="cart-plus-minus">

                                    <input class="cart-plus-minus-box" type="text" name="qty_food" value="2">
                                </div>
                                @foreach ($info_film as $film)
                                @foreach ($film->film_using_pivot_schedules as $item)
                                <input type="hidden" name="filmID" value="{{$item->id}}">
                                @endforeach
                                @endforeach
                                <input type="hidden" name="food_name" value="{{$food->f_name}}">
                                <input type="hidden" name="roomID" value="{{$roomID}}">
                                <input type="hidden" name="dateToday" value="{{$today}}">
                                <button type="submit" class="custom-button">
                                    add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @elseif($food->coff_id == 4)
                <div class="grid-item combos">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="{{asset('assets_client/images/movie/popcorn/popcorn.jpg')}}" alt="movie/popcorn">
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
                            <form class="cart-button" method="post" action="{{route('booking.book_tickets_post')}}">
                                @csrf
                                <div class="cart-plus-minus">

                                    <input class="cart-plus-minus-box" type="text" name="qty_food" value="2">
                                </div>
                                @foreach ($info_film as $film)
                                @foreach ($film->film_using_pivot_schedules as $item)
                                <input type="hidden" name="filmID" value="{{$item->id}}">
                                @endforeach
                                @endforeach
                                <input type="hidden" name="foodID" value="{{$food->f_id}}">
                                <input type="hidden" name="food_name" value="{{$food->f_name}}">
                                <input type="hidden" name="roomID" value="{{$roomID}}">
                                <input type="hidden" name="dateToday" value="{{$today}}">
                                <button type="submit" class="custom-button">
                                    add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="booking-summery bg-one">
            <h4 class="title">booking summery</h4>
            @foreach ($info_film as $item)
            @foreach ($item->film_using_pivot_schedules as $film)

            <ul>
                <li>
                    <h6 class="subtitle">{{$film->film_name}}</h6>
                    <span class="info">{{$film->language}}</span>
                </li>
                <li>
                    <h6 class="subtitle">
                        <span>{{$film->brand->name}}</span><span>0{{count(collect($list_seatname))}}</span></h6>
                    <div class="info"><span>{{date('d/m/Y h:i A', strtotime($today)) }}</span> <span>Tickets</span>
                    </div>
                </li>
                <li>
                    <h6 class="subtitle mb-0"><span>Tickets Price</span><span>{{$totalPrice}}</span></h6>
                </li>
            </ul>
            @endforeach
            @endforeach
        </div>
        <div class="note">
            <h5 class="title">Note :</h5>
            <p>Please give us 15 minutes for F& B preparation once you're at the cinema</p>
        </div>
    </div>
</div>
@endsection