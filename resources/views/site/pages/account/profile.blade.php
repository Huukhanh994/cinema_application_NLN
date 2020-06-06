<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/apps-download.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:31:25 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('assets_client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets_client/css/main.css')}}">

    <link rel="shortcut icon" href="{{asset('assets_client/images/favicon.png')}}" type="image/x-icon">

    <title>Account Profile</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    @include('site.partials_2.header')
    <!-- ==========Header-Section========== -->

    <!-- ==========Banner-Section========== -->
    <section class="speaker-banner bg_img" data-background="{{asset('assets_client/images/banner/banner07.jpg')}}">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">Profile</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        Profile
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <!-- ==========Banner-Section========== -->
    
    <!-- ==========Speaker-Single========== -->
    <section class="contact-section padding-top">
        <div class="contact-container">
            <div class="bg-thumb bg_img" data-background="{{asset('assets_client/images/contact/contact.jpg')}}"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="section-header-3 left-style">
                            <span class="cate">Account Information</span>
                            <h2 class="title">Welcome to {{Auth::user()->first_name}}</h2>
                        </div>
                        <form class="contact-form" id="contact_form_submit" method="POST" action="{{route('account.updateInfo', Auth::user()->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" name="first_name" id="first_name" value="{{Auth::user()->first_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" name="last_name" id="last_name" value="{{Auth::user()->last_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" name="last_name" id="last_name" value="{{Auth::user()->last_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" name="email" id="email" value="{{Auth::user()->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="tel">Phone number <span>*</span></label>
                                <input type="text" name="tel" id="tel" value="{{Auth::user()->tel}}" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City <span>*</span></label>
                                <input type="text" name="city" id="city" value="{{Auth::user()->city}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span>*</span></label>
                            <textarea name="address" id="address" required>{{Auth::user()->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <div class="padding-top padding-bottom contact-info">
                            <div class="info-area">
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="{{asset('assets_client/images/contact/contact01.png')}}" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">phone number</h6>
                                        @if (isset(Auth::user()->tel))
                                            <a href="Tel:{{Auth::user()->tel}}">+{{Auth::user()->tel}}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="{{asset('assets_client/images/contact/contact02.png')}}" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Email</h6>
                                        @if (isset(Auth::user()->email))
                                            <a href="Mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Contact-Section========== -->
    <!-- ==========Speaker-Single========== -->

    <!-- ==========Speaker-Section========== -->
    <section class="feature-section padding-bottom padding-top">
       
    </section>
    <!-- ==========Speaker-Section========== -->

    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <div class="newslater-section padding-bottom">
            <div class="container">
                <div class="newslater-container bg_img" data-background="{{asset('assets_client/images/newslater/newslater-bg01.jpg')}}">
                    <div class="newslater-wrapper">
                        <h5 class="cate">subscribe to Boleto </h5>
                        <h3 class="title">to get exclusive benifits</h3>
                        <form class="newslater-form">
                            <input type="text" placeholder="Your Email Address">
                            <button type="submit">subscribe</button>
                        </form>
                        <p>We respect your privacy, so we never share your info</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="logo">
                    <a href="index-1.html">
                        <img src="{{asset('assets_client/images/footer/footer-logo.png')}}" alt="footer">
                    </a>
                </div>
                <ul class="social-icons">
                    <li>
                        <a href="#0">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-area">
                    <div class="left">
                        <p>Copyright © 2020.All Rights Reserved By <a href="#0">Boleto </a></p>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="#0">About</a>
                        </li>
                        <li>
                            <a href="#0">Terms Of Use</a>
                        </li>
                        <li>
                            <a href="#0">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#0">FAQ</a>
                        </li>
                        <li>
                            <a href="#0">Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==========Newslater-Section========== -->


    <script src="{{asset('assets_client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets_client/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets_client/js/plugins.js')}}"></script>
    <script src="{{asset('assets_client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_client/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets_client/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets_client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_client/js/wow.min.js')}}"></script>
    <script src="{{asset('assets_client/js/countdown.min.js')}}"></script>
    <script src="{{asset('assets_client/js/odometer.min.js')}}"></script>
    <script src="{{asset('assets_client/js/viewport.jquery.js')}}"></script>
    <script src="{{asset('assets_client/js/nice-select.js')}}"></script>
    <script src="{{asset('assets_client/js/main.js')}}"></script>
</body>


<!-- Mirrored from pixner.net/boleto/demo/apps-download.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:31:27 GMT -->

</html>