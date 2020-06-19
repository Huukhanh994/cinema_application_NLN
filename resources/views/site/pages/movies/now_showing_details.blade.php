<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:20:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   {{-- <link rel="stylesheet" href="{{ asset('assets_client/css/bootstrap.min.css') }}"> --}}
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('assets_client/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/animate.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/flaticon.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/magnific-popup.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/odometer.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/owl.theme.default.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/nice-select.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/jquery.animatedheadline.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets_client/css/main.css') }} ">
    
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">

    <title>Details</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    {{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}
        
        /* Button used to open the contact form - fixed at the bottom of the page */
        
        /* The popup form - hidden by default */
        .form-popup {
          display: none;
          position: fixed;
          bottom: 50px; 
          margin: 0 auto;
          right: 10px;
          border: 3px solid #f1f1f1;
          z-index: 99999;
        }
        
        /* Add styles to the form container */
        .form-container {
          width: 1500px;
          height: 250vh;
          max-width: 1500px;
          padding: 10px;
          background-color: white;
        }
        
        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
        }
        
        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Set a style for the submit/login button */
        .form-container .btn {
          background-color: #4CAF50;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          width: 100%;
          margin-bottom:10px;
          opacity: 0.8;
        }
        
        /* Add a red background color to the cancel button */
        .form-container .cancel {
          background-color: red;
        }
        
        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
          opacity: 1;
        }

        #cboxClose {
            position: absolute;
            top: 5px;
            right: 5px;
            display: block;
            width: 38px;
            height: 19px;
            color: black;
        }
        .close:hover{
            color:red;
        }
        #current {
            background: red;
        }
        #schedule h1{
            color: green;
        }

        #top_calendar{
            display: inline-block;
        }
        ul, ol, li {
            list-style: none;
            float: left;
        }

        ul.toggle-tabs{
            border-bottom: 2px solid #2b2b2b;
            border-top: 2px solid #2b2b2b;
            display: inline-block;
            margin-bottom: 30px;
            padding: 20px 0;
        }
        
        ul.toggle-tabs li:hover{
            background: black;
            transition: 0.5s;
            color: white;
        }
        ul.toggle-tabs li {
            border: 2px solid #fff;
            border-radius: 5px;
        }

        ul.toggle-tabs li:first-child{
            border: 2px solid #222;
            border-radius: 5px;
        }

        .day{
            color: #717171;
            cursor: pointer;
            height: 48px;
            position: relative;
            width: 77px;
        }
        .day > span{
            color: #717171;
            font-size: 11px;
            left: 7px;
            position: absolute;
            top: 4px;
        }
        .day > em{
            color: #717171;
            font-size: 11px;
            font-style: normal;
            left: 4px;
            position: absolute;
            top: 25px;
        }

        .day > strong{
            color: #717171;
            font-size: 32px;
            font-weight: normal;
            left: 41px;
            line-height: 32px;
            position: absolute;
            top: 0px;
        }
    </style>
    <script src="{{asset('assets_client/js/moment.js')}}"></script>
    
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
    <section class="about-section padding-top padding-bottom">
        <div class="container">
            <section class="details-banner bg_img" data-background="{{asset('assets_client/images/banner/banner07.jpg')}}">
                <div class="container">
                    <div class="details-banner-wrapper">
                        <div class="details-banner-thumb">
                            @if ($film->images->count() > 0)
                                <img src="{{ $film->images->first()->full }}" alt="movie" width="255px" height="367px">
                                <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                                    <img src="{{asset('assets_client/images/movie/video-button.png')}}" alt="movie">
                                </a>
                            @else
                                <img src="https://via.placeholder.com/176" alt="movie" width="255px" height="367px">
                                <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                                    <img src="{{asset('assets_client/images/movie/video-button.png')}}" alt="movie">
                                </a>
                            @endif
                            
                        </div>
                        <div class="details-banner-content offset-lg-3">
                            <h3 class="title" 
                                style="position: relative;
                                    left: 275px;">{{$film->film_name}}</h3>
                            <div class="tags" 
                                style="position: relative;
                                        left: 275px;">
                                @foreach ($film->categories as $category)
                                    <a href="#0">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <div class="social-and-duration">
                                <div class="duration-area" 
                                    style="position: relative;
                                            left: 275px;">
                                    <div class="item">
                                        <i class="fas fa-calendar-alt"></i><span>{{$film->date_release}}</span>
                                    </div>
                                    <div class="item">
                                        <i class="far fa-clock"></i><span>{{$film->duration}} mins</span>
                                    </div>
                                </div>
                                <ul class="social-share">
                                    <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- ==========Banner-Section========== -->

            <!-- ==========Book-Section========== -->
            <section class="book-section bg-one">
                <div class="container">
                    <div class="book-wrapper offset-lg-3">
                        <div class="left-side">
                            <div class="item">
                                <div class="item-header">
                                    <div class="thumb">
                                        <img src="{{asset('assets_client/images/movie/tomato2.png')}}" alt="movie">
                                    </div>
                                    <div class="counter-area">
                                        <span class="counter-item odometer" data-odometer-final="88">0</span>
                                    </div>
                                </div>
                                <p>tomatometer</p>
                            </div>
                            <div class="item">
                                <div class="item-header">
                                    <div class="thumb">
                                        <img src="{{asset('assets_client/images/movie/cake2.png')}}" alt="movie">
                                    </div>
                                    <div class="counter-area">
                                        <span class="counter-item odometer" data-odometer-final="88">0</span>
                                    </div>
                                </div>
                                <p>audience Score</p>
                            </div>
                            <div class="item">
                                <div class="item-header">
                                    @forelse ($rating_film as $rating)
                                        <h5 class="title">{{$rating->rating}}</h5>
                                        <div class="rated">
                                            @for ($i = 0; $i < $rating->rating; $i++)
                                                <i class="fas fa-heart"></i>
                                            @endfor
                                        </div>
                                    @empty
                                        <h5 class="title">0.0</h5>
                                        <div class="rated rate-it">
                                            <i class="fas fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                        </div>
                                    @endforelse
                                </div>
                                <p>Users Rating</p>
                            </div>
                        </div>
                        <a href="#" class="custom-button" onclick="openForm()">book tickets</a>
                    </div>
                </div>
                <input type="hidden" name="" id="myAnchor" target="{{$film->id}}">
                <div class="form-popup" id="myForm" style="width: 1500px;
                overflow: auto;
                height: 634px;">
                    <form action="#" class="form-container">
                        <div> <span type="button" class="close" onclick="closeForm()"> <span>&times;</span></span> </div>
                            <div id="top_calendar">
                                
                            </div>
                            <div id="show_not_films" style="color:red; display: none">
                                Not found film on this day. Please choose another!
                            </div>
                            <div id="show_cities" class="row" style="display:none">
                               
                            </div>
                            <div id="show_rooms" class="row">
                            
                            </div>
                            <div id="show">
                                
                            </div>
                            <div id="schedule">
                                
                            </div>
                            <div id="current">

                            </div>
                    </form>
                </div>
            </section>
            <!-- ==========Book-Section========== -->

            <!-- ==========Movie-Section========== -->
            <section class="movie-details-section padding-top padding-bottom">
                <div class="container">
                    <div class="row justify-content-center flex-wrap-reverse mb--50">
                        <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                            <div class="widget-1 widget-tags">
                                <ul>
                                    <li>
                                        <a href="#0">2D</a>
                                    </li>
                                    <li>
                                        <a href="#0">imax 2D</a>
                                    </li>
                                    <li>
                                        <a href="#0">4DX</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-1 widget-offer">
                                <h3 class="title">Applicable offer</h3>
                                <div class="offer-body">
                                    <div class="offer-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets_client/images/sidebar/offer01.png')}}" alt="sidebar">
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="#0">Amazon Pay Cashback Offer</a>
                                            </h6>
                                            <p>Win Cashback Upto Rs 300*</p>
                                        </div>
                                    </div>
                                    <div class="offer-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets_client/images/sidebar/offer02.png')}}" alt="sidebar">
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="#0">PayPal Offer</a>
                                            </h6>
                                            <p>Transact first time with Paypal and
                                                get 100% cashback up to Rs. 500</p>
                                        </div>
                                    </div>
                                    <div class="offer-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets_client/images/sidebar/offer03.png')}}" alt="sidebar">
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="#0">HDFC Bank Offer</a>
                                            </h6>
                                            <p>Get 15% discount up to INR 100* 
                                                and INR 50* off on F&B T&C apply</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-1 widget-banner">
                                <div class="widget-1-body">
                                    <a href="#0">
                                        <img src="{{asset('assets_client/images/sidebar/banner/banner01.jpg')}}" alt="banner">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 mb-50">
                            <div class="movie-details">
                                <h3 class="title">photos</h3>
                                <div class="details-photos owl-carousel">
                                    @if ($film->images->count() > 0)
                                        @foreach ($film->images as $image)
                                        <div class="thumb">
                                            <a href="{{$film->images->first()->full}}" class="img-pop">
                                                <img src="{{$film->images->first()->full}}" alt="movie">
                                            </a>
                                        </div>
                                        @endforeach
                                    @else
                                    <div class="thumb">
                                        <a href="{{asset('assets_client/images/movie/movie-details02.jpg')}}" class="img-pop">
                                            <img src="https://via.placeholder.com/176" alt="movie">
                                        </a>
                                    </div>
                                    @endif
                                   
                                </div>
                                <div class="tab summery-review">
                                    <ul class="tab-menu">
                                        <li class="active">
                                            summery
                                        </li>
                                        <li>
                                            user review <span>{{$count_comment}}</span>
                                        </li>
                                    </ul>
                                    <div class="tab-area">
                                        <div class="tab-item active">
                                            <div class="item" style="display: inline-block;">
                                                <h5 class="sub-title">Descrition</h5>
                                                <p>{{$film->describe}}</p>
                                            </div>
                                            <div class="item">
                                                <h5 class="sub-title">Casts</h5>
                                                <p>
                                                    @foreach ($list_actor as $item)
                                                        <span>{{ $item }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="item">
                                                <h5 class="sub-title">Language</h5>
                                                <p>{{$film->language}}</p>
                                            </div>
                                            <div class="item">
                                                <h5 class="sub-title">Rated</h5>
                                                @foreach ($film->rates as $rate)
                                                    <p>{{$rate->name}}</p>
                                                @endforeach
                                            </div>
                                            @auth
                                            <form action="{{ route('movies.post_ratings') }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="card">
                                                    <div class="container-fliud">
                                                        <div class="wrapper row">
                                                            <div class="details col-md-6">
                                                                <h3 class="product-title"></h3>
                                                                <div class="rating">
                                                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                                                        data-step="1" value="{{ $film->userAverageRating }}" data-size="xs">
                                                                    <input type="hidden" name="id" required="" value="{{ $film->id }}">
                                                                    <span class="review-no">422 reviews</span>
                                                                    <br />
                                                                    <button class="btn btn-success">Submit Review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                                data-numposts="5" data-width=""></div>
                                            <div id="fb-root"></div>
                                            <script async defer crossorigin="anonymous"
                                                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=1044383589264310&autoLogAppEvents=1">
                                            </script>
                                            @endauth
                                            
                                        </div>
                                        <br>
                                        <br>
                                
                                        <div class="tab-item" id="app">
                                            @if (isset($comments[0]->film_id))
                                                @if ($film->id === $comments[0]->film_id)
                                                    <comments :film_id="{{$film->id}}"></comments>
                                                @else
                                                    Not comment on this film!
                                                @endif
                                            @else
                                                Not comment to show!
                                            @endif
                                            @if (Auth::check())
                                                <new-comment :film_id="{{$film->id}}"></new-comment>
                                            @endif
                                        </div>
                                        @guest
                                            <div class="checkout-widget d-flex flex-wrap align-items-center justify-cotent-between">
                                                <div class="title-area">
                                                    <h5 class="title">Sign in to rate and comment for this film?</h5>
                                                </div>
                                                <a href="http://127.0.0.1:8000/login" class="sign-in-area">
                                                    <i class="fas fa-user"></i><span>Sign in</span>
                                                </a>
                                            </div>    
                                            @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==========Movie-Section========== -->
        </div>
    </section>


    @include('site.partials.footer')
    <!-- ==========Newslater-Section========== -->
    

   @include('site.partials.js')
   <script>
    var arrayList = 
    [   
        {
            city_id: 2,
            city_name: "Hồ Chí Minh",
            },
        {
            city_id: 2,
            city_name: "Hồ Chí Minh",
        },
        {
            city_id: 3,
            city_name: "Hà Nội",
            },
        {
            city_id: 3,
            city_name: "Hà Nội",
        }
    ];
    
    function setUnique(array) {
        var flags = [], output = [], l = array.length, i;
        for( i=0; i<l; i++) {
            if( flags[array[i].city_name]) continue;
            flags[array[i].city_name] = true;
            output.push(array[i]);
        }
        return output;
    }
    
    var array_Clusters = [
        {
            cluster_id: 2,
            cluster_name: "CGV Hùng Vương Plaza",
            room_name: "Cinema 1",
            room_id: 6
        },
        {
            cluster_id: 2,
            cluster_name: "CGV Hùng Vương Plaza",
            room_name: "Cinema 3",
            room_id: 8
        },
    ]
    function setUniqueCluster(array) {
        var flags = [], output = [], l = array.length, i;
        for( i=0; i<l; i++) {
            if( flags[array[i].cluster_name]) continue;
            flags[array[i].cluster_name] = true;
            output.push(array[i]);
        }
        return output;
    }

    function openForm() {
        document.getElementById("myForm").style.display = "block";
        var id = document.getElementById("myAnchor").getAttribute("target");
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "{{route('movies.now_showing_ajax')}}",
            data: {id: id},
            success: function (response) {
                var resultData = response.film_ajax;     
            
                // console.log(response.film_ajax);
                // console.log(response.films[0].start_time);
                // console.log(response.films[0].end_time);
                // console.log(response.films)
        
                var current = response.currentDate;
                var bodyData = '';
                var i=1;
                var start = "";
                var end = "";
                response.rooms.forEach(date => {
                    start = date.start_time;
                    end = date.end_time;
                })
                // var startDate = new Date(response.start);
                // var endDate = new Date(response.end);
                // var today = new Date(response.currentDate);
                // var diff = Math.abs(endDate -  startDate);
                var d1 = new Date(); //"now"
                // console.log("Today: " + d1);
                var d0 = new Date(start);
                // console.log("Start Time:" + d0);
                var d2 = new Date(end)  // end date
                // console.log("End Time " + d2);
                var diff = Math.abs(d1-d2);
                // console.log(diff);
                if( d1 > d0 && d1 < d2)
                {
                    // console.log("Chieu");
                }else {
                    // console.log("Chua chieu");
                }

                var sub = new Date();
                sub.setDate(d2.getDate() - d1.getDate());
                // console.log(sub.getDate());

                // Stackoverflow
                var now = new Date();       // today
                var daysOfYear = [];        // array save dates between start && end
                var d = new Date();
                for (var d = now; d < d2.setDate(d2.getDate()) ; d.setDate(d.getDate() + 1)) {
                daysOfYear.push(new Date(d));
                }
                // console.log(daysOfYear);
                var day_schedule = "";
                var days = "";
                var weekdays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                $.each(daysOfYear, function(index,days) {
                    // console.log(days);
                    day_schedule += 
                                // "<div>"+ 
                                //     days.getUTCDate() + "," + (days.getUTCMonth()+1) + "," + weekdays[days.getDay()] 
                                // +"</div>";
                                "<ul class='toggle-tabs'>" +
                                    "<li>" +
                                        "<div class='day'>" +
                                            "<span>"+ (days.getUTCMonth()+1) +"</span>"+
                                            "<em>"+ weekdays[days.getDay()]  +"</em>" +
                                            "<strong>"+ days.getUTCDate() +"</strong>"+
                                        "</div>" +
                                    "</li>" +
                                "</ul>";
                });
                // $('#top_calendar').html(day_schedule);

                
                var list_cities = "";
                var list_rooms = "";
                let list_citys = "<ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'>";
                    response.rooms.forEach(city => {
                        let array_name_city = setUnique(city.room_use_pivot_schedules);
                        // console.log(array_name_city);
                        if(array_name_city) {
                            array_name_city.forEach(citychild => {
                                const listItem = '<li class="nav-item" style="margin: 0 10px;"><input type="hidden" name="filmID" id="filmID" value="'+citychild.film_id+'"> <a class="nav-link active" id="'+citychild.city_id+'" onclick="myFunction(this.id)" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">'+citychild.city_name+'</a> </li>'
                                list_citys += listItem;       
                            })
                        }
                    })
                list_citys +="</ul>";

                $('#show_cities').html(list_citys);
                // console.log(response.rooms)
                $.each(response.rooms,function(index,roomValue){
                        // console.log(new Date(roomValue.start_time).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"))
                        // TODO: Nếu phòng đó có thành phố thì lặp các thành phố đó ra.
                        list_rooms +=
                            "<ul class='nav nav-pills nav-fill' style='margin: 0 10px;'>";
                            list_rooms += '<dl>';
                            list_rooms += '<dt>';
                                list_rooms +="<li class='nav-item'>";
                                    list_rooms +='<a class="nav-link" href="#">'+roomValue.cluster_name+'</a>';
                                    list_rooms +='</li>';
                                    list_rooms += '</dt>';
                                    list_rooms += '</dl>';
                                    list_rooms +='</ul>';
                });
                // $('#show_rooms').html(list_rooms);   
            }
        });

    }
    Date.prototype.addDays = function(days) {
       var dat = new Date(this.valueOf())
       dat.setDate(dat.getDate() + days);
       return dat;
    }

    function getDates(startDate, stopDate) {
      var dateArray = new Array();
      var currentDate = startDate;
      while (currentDate <= stopDate) {
        dateArray.push(currentDate)
        currentDate = currentDate.addDays(1);
      }
      return dateArray;
    }
    var dateArray = getDates(new Date(), (new Date()).addDays(17));
    var list_date = "";
    var weekdays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    for (i = 0; i < dateArray.length; i ++ ) {
            list_date += "<ul class='toggle-tabs'>";
                list_date += "<li>";
                list_date += '<a href="#" id="'+dateArray[i].getFullYear()+"-"+(dateArray[i].getUTCMonth()+1)+"-"+dateArray[i].getUTCDate()+'" onclick="functionDate(this.id)">';
                    list_date += "<div class='day'>";
                        list_date += "<span>"+ (dateArray[i].getUTCMonth()+1) +"</span>";
                        list_date += "<em>"+ weekdays[dateArray[i].getDay()]  +"</em>" ;
                        list_date += "<strong>"+ dateArray[i].getUTCDate() +"</strong>";
                        list_date += "</div>";
                        list_date += "</li>";
                        list_date += "</a>";
                        list_date += "</ul>";
        $('#top_calendar').html(list_date);
    }
    
    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }

    var dateToDay;
    function functionDate(date)
    {
        var id = document.getElementById("myAnchor").getAttribute("target"); // nay la id phim hay id city  // film :)))
        // ngay de check
        dateToDay = date;
        
        $.ajax({
            type: "GET",
            url: "{{route('movies.now_showing_ajax')}}",
            data: {date: dateToDay,filmID: id},        // truyền ngày check qua bên controller để so sánh có nằm giữa start and end ko?
            success: function (response) {
                var endDate = new Date(response.max_date.end_time);
                // console.log(endDate);
                var end = endDate.getFullYear()+ "-" + (endDate.getUTCMonth()+1) + "-" + endDate.getDate();
                var date_check = response.dateCheck;
                // console.log(end);
               

                response.films_date.forEach(film => {
                    // console.log(film.date_release);
                    var dateRelease = new Date(film.date_release);
                    var release = dateRelease.getFullYear()+ "-" + (dateRelease.getUTCMonth()+1) + "-" + dateRelease.getUTCDate();
                    // console.log(release);
                    var d1 = release.split("-");
                    var d2 = end.split("-");
                    var c = response.dateCheck.split("-");
                    
                    var from = new Date(d1[0], parseInt(d1[1])-1, d1[2]);  // -1 because months are from 0 to 11
                    var to   = new Date(d2[0], parseInt(d2[1])-1, d2[2]);
                    var check = new Date(c[0], parseInt(c[1])-1, c[2]);

                    // console.log(check > from && check < to);
                    if(check > from && check <= to) {
                        document.getElementById('show_cities').style.display = "block";     // hiện thành phố
                        document.getElementById('show_not_films').style.display = "none";
                        document.getElementById('show_rooms').style.display = "block";
                    }else {
                        document.getElementById('show_not_films').style.display = "block";
                        document.getElementById('show_cities').style.display = "none";
                        document.getElementById('show_rooms').style.display = "none";
                    }
                    
                });
            }
            
        }); 
       return dateToDay;
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    function myFunction(id) {
        const city_id = id;
        const film_id = $('#filmID').val();
        $.ajax({
            type: "GET",
            url: "{{ route('movies.now_showing_getRoomAjax') }}",
            data: {cityID: city_id,filmID: film_id},
            success: function (response) {
                // console.log(response.rooms);
                const seatEmpty = response.seat_empty;
                let list_rooms = '<div class="tab-content" id="nav-tabContent">';
                    response.rooms.forEach(room => {
                    // console.log(room);
                    list_rooms +=
                            "<ul class='nav nav-pills nav-fill' style='margin: 0 10px;'>";
                            list_rooms += '<dl>';
                            list_rooms += '<dt>';
                            list_rooms +="<li class='nav-item'>";
                                list_rooms +='<a class="nav-link" href="#">'+room.cluster_name+'</a>';
                                list_rooms +='</li>';
                                list_rooms += '</dt>';
                                        let url = '{{route('booking.book_tickets',":id")}}';
                                        url = url.replace(':id',room.room_id);
                                        list_rooms += '<dd>';
                                        list_rooms += '<dl>';
                                        list_rooms += '<dt><a class="nav-link" href="#">'+room.room_name+ "("+ room.city_name+")"+'</a></dt>';
                                        list_rooms += "<dd>";
                                        list_rooms += '<a href="/book_tickets/id=' + room.room_id + "/film="+room.film_id+"/today="+dateToDay+'" style="margin-left: 20px;border: 1px solid black;">';
                                        list_rooms += "<span style='padding-left:20px; margin-right: 10px'>"+formatAMPM(new Date(room.start_time))+"</span> <br>";
                                        if(seatEmpty) { 
                                            seatEmpty.forEach(seat => {
                                                console.log(seat);
                                                list_rooms += "<span style='padding-left:20px; margin-right: 10px'>"+seat.seat_empty+" empty seat</span>";
                                            })
                                        }
                                        list_rooms += "</a>";
                                        list_rooms += "</dd>";
                                        list_rooms += '</dl>';
                                        list_rooms += '</dd>';
                                list_rooms += '</dl>';
                                list_rooms +='</ul>';

                });
                list_rooms += '</div>';

                $('#show_rooms').html(list_rooms);
            }
        });
    }

   </script>
    
    <script src="{{ asset('backend/js/app.js') }}"></script>
</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:22:02 GMT -->
</html>

