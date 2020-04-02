<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:20:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('site.partials.css')

    <title>Booking</title>
    
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

        <!-- ==========Banner-Section========== -->
        <section class="details-banner hero-area bg_img seat-plan-banner" data-background="{{asset('assets_client/images/banner/banner04.jpg')}}">
            <div class="container">
                <div class="details-banner-wrapper">
                    <div class="details-banner-content style-two">
                        @foreach ($info_film as $film)
                            <h3 class="title">{{$film->film_name}}</h3>
                            <div class="tags">
                                <a href="#0">{{$film->duration}} mins</a>
                                <a href="#0">{{$film->language}}</a>
                            </div>
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
                        <a href="movie-ticket-plan.html" class="custom-button back-button">
                            <i class="flaticon-double-right-arrows-angles"></i>back
                        </a>
                    </div>
                    <div class="item date-item">
                        <span class="date">MON, SEP 09 2020</span>
                        <select class="select-bar">
                            <option value="sc1">09:40</option>
                            <option value="sc2">13:45</option>
                            <option value="sc3">15:45</option>
                            <option value="sc4">19:50</option>
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
                <div class="screen-area">
                    <h4 class="screen">screen</h4>
                    <div class="screen-thumb">
                        <img src="{{asset('assets_client/images/movie/screen-thumb.png')}}" alt="movie">
                    </div>
                    <h5 class="subtitle">silver plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            <li class="seat-line">
                                <span>G</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>G</span>
                            </li>
                            <li class="seat-line">
                                <span>f</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat seat-free">
                                                <img src="{{asset('assets_client/images/movie/seat01-free.png')}}" alt="seat">
                                                <span class="sit-num">f7</span>
                                            </li>
                                            <li class="single-seat seat-free">
                                                <img src="{{asset('assets_client/images/movie/seat01-free.png')}}" alt="seat">
                                                <span class="sit-num">f8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat seat-free">
                                                <img src="{{asset('assets_client/images/movie/seat01-free.png')}}" alt="seat">
                                                <span class="sit-num">f9</span>
                                            </li>
                                            <li class="single-seat seat-free">
                                                <img src="{{asset('assets_client/images/movie/seat01-free.png')}}" alt="seat">
                                                <span class="sit-num">f10</span>
                                            </li>
                                            <li class="single-seat seat-free">
                                                <img src="{{asset('assets_client/images/movie/seat01-free.png')}}" alt="seat">
                                                <span class="sit-num">f11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat01.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>f</span>
                            </li>
                        </ul>
                    </div>
                    <h5 class="subtitle">silver plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area couple">
                            <li class="seat-line">
                                <span>e</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>e</span>
                            </li>
                            <li class="seat-line">
                                <span>d</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-booked.png')}}" alt="seat">
                                                <span class="sit-num">D7 D8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>d</span>
                            </li>
                            <li class="seat-line">
                                <span>c</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">f11 f12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>c</span>
                            </li>
                            <li class="seat-line">
                                <span>b</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">b7 b8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <img src="{{asset('assets_client/images/movie/seat02.png')}}" alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>b</span>
                            </li>
                            <li class="seat-line">
                                <span>a</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a1 a2</span>
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a3 a4</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a5 a6</span>
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a7 a8</span>
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a9 a10</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a11</span>
                                            </li>
                                            <li class="single-seat seat-free-two">
                                                <img src="{{asset('assets_client/images/movie/seat02-free.png')}}" alt="seat">
                                                <span class="sit-num">a12</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>a</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="proceed-book bg_img" data-background="{{asset('assets_client/images/movie/movie-bg-proceed.jpg')}}">
                    <div class="proceed-to-book">
                        <div class="book-item">
                            <span>You have Choosed Seat</span>
                            <h3 class="title">d9, d10</h3>
                        </div>
                        <div class="book-item">
                            <span>total price</span>
                            <h3 class="title">$150</h3>
                        </div>
                        <div class="book-item">
                            <a href="movie-checkout.html" class="custom-button">proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==========Movie-Section========== -->
        @include('site.partials.footer')
        <!-- ==========Newslater-Section========== -->
    
    
       @include('site.partials.js')

</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:22:02 GMT -->
</html>
    