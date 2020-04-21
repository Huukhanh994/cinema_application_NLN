<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/movie-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:25:17 GMT -->
<head>
    @include('site.partials_2.meta')

    @include('site.partials_2.css')

    @include('site.partials_2.logo')

    @include('site.partials_2.title')


</head>

<body>
    <!-- ==========Preloader========== -->
    @include('site.partials_2.preloader')
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    @include('site.partials_2.overlay')
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    @include('site.partials_2.header')
    <!-- ==========Header-Section========== -->

    <!-- ==========Banner-Section========== -->
    @include('site.partials_2.banner')
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    @include('site.partials_2.page-title')
    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->

    <!-- ==========Newslater-Section========== -->
    @include('site.partials_2.footer')
    <!-- ==========Newslater-Section========== -->


    @include('site.partials_2.js')
</body>


<!-- Mirrored from pixner.net/boleto/demo/movie-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:25:18 GMT -->
</html>