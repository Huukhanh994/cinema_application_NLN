
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:31:27 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets_client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_client/css/main.css') }}">

    <link rel="shortcut icon" href="{{asset('assets_client/images/favicon.png')}}" type="image/x-icon">

    <title>Boleto  - Online Ticket Booking Website HTML Template</title>


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

<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="{{asset('assets_client/images/account/account-bg.jpg')}}">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">welcome</span>
                    <h2 class="title">to Boleto </h2>
                </div>
                <form class="account-form" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name<span>*</span></label>
                        <input type="text" name="name" @error('name') is-valid @enderror placeholder="Enter Your Name" id="email" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span>*</span></label>
                        <input type="text" name="address" @error('address') is-valid @enderror placeholder="Enter Your Address" id="address" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City<span>*</span></label>
                        <input type="text" name="city" @error('city') is-valid @enderror placeholder="Enter Your City" id="city" required>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country<span>*</span></label>
                        <input type="text" name="country" @error('country') is-valid @enderror placeholder="Enter Your Country" id="country" required>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="text" name="email" @error('email') is-valid @enderror placeholder="Enter Your Email" id="email" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span>*</span></label>
                        <input type="password" name="password" @error('password') is-valid @enderror placeholder="Password" id="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password<span>*</span></label>
                        <input type="password" name="password_confirmation" placeholder="Password Confirm" id="password-confirm" required autocomplete="new-password">
                    </div>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal" required checked>
                        <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="sign up">
                    </div>
                </form>
                <div class="option">
                    Already have an account? <a href="{{route('login')}}">Login</a>
                </div>
                <div class="or"><span>Or</span></div>
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
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->

    <script src="{{ asset('assets_client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets_client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets_client/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets_client/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets_client/js/main.js') }}"></script>
</body>


<!-- Mirrored from pixner.net/boleto/demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:31:28 GMT -->
</html>