
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:31:27 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <title>Sign up</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>

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
                        <label for="first_name">First Name<span>*</span></label>
                        <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name<span>*</span></label>
                        <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span>*</span></label>
                        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City<span>*</span></label>
                        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country<span>*</span></label>
                        <input type="text" id="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span>*</span></label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password<span>*</span></label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal" required checked>
                        <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LfJJuwUAAAAABA8D8rbOp-tiTymOsqNdsGgFgZC">
                        </div>
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