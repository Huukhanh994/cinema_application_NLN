
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:20:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('site.partials.css')

    <title>@yield('title') - {{ config('app.name') }}</title>

    @stack('custom_css')
    
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
    <!-- ==========Header-Section========== -->

    <!-- ==========Banner-Section========== -->
    @include('site.partials.banner')
    <!-- ==========Banner-Section========== -->

    <!-- ==========Ticket-Search========== -->
    @include('site.partials.ticket_search')  
    <!-- ==========Ticket-Search========== -->
   
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <section class="about-section padding-top padding-bottom">
            <main class="app-content" id="app">
                @yield('content')
            </main>
        </section>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ==========Movie-Main-Section========== -->
    {{-- @include('site.partials.movie_main') --}}
    <!-- ==========Movie-Main-Section========== -->

    <!-- ==========Newslater-Section========== -->
    @include('site.partials.footer')
    <!-- ==========Newslater-Section========== -->


   @include('site.partials.js')
   
   @stack('custom_js')

   @stack('custom_vue')
</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 15:22:02 GMT -->
</html>