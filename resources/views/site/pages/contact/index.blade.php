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
                <h2 class="title">Contact</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        Contact
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Contact-Section========== -->
    <section class="contact-section padding-top">
        <div class="contact-container">
            <div class="bg-thumb bg_img" data-background="assets/images/contact/contact.jpg"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="section-header-3 left-style">
                            <span class="cate">contact us</span>
                            <h2 class="title">get in touch</h2>
                            <p>We’d love to talk about how we can work together. Send us a message below and we’ll respond
                                as soon as possible.</p>
                        </div>
                        <form class="contact-form" id="contact_form_submit">
                            <div class="form-group">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" placeholder="Enter Your Full Name" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" placeholder="Enter Your Email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject <span>*</span></label>
                                <input type="text" placeholder="Enter Your Subject" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message <span>*</span></label>
                                <textarea name="message" id="message" placeholder="Enter Your Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <div class="padding-top padding-bottom contact-info">
                            <div class="info-area">
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="assets/images/contact/contact01.png" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">phone number</h6>
                                        <a href="Tel:82828282034">+1234 56789</a>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="assets/images/contact/contact02.png" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Email</h6>
                                        <a href="Mailto:info@gmail.com">info@Boleto .com</a>
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
    <!-- ==========Contact-Counter-Section========== -->
    <section class="contact-counter padding-top padding-bottom">

    </section>
    <!-- ==========Contact-Counter-Section========== -->
    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <div class="newslater-section padding-bottom">
            <div class="container">
                <div class="newslater-container bg_img"
                    data-background="{{asset('assets_client/images/newslater/newslater-bg01.jpg')}}">
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