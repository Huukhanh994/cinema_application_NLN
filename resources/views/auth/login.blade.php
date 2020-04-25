
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

    <title>Sign in</title>
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
                        <span class="cate">hello</span>
                        <h2 class="title">welcome back</h2>
                    </div>
                    <form class="account-form" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email<span>*</span></label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span>*</span></label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group checkgroup">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <a href="#0" class="forget-pass">Forget Password</a>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfJJuwUAAAAABA8D8rbOp-tiTymOsqNdsGgFgZC">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="login">
                        </div>
                    </form>
                    <div class="option">
                        Don't have an account? <a href="{{ route('register') }}">sign up now</a>
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