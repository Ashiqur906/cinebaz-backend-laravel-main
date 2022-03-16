<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Cinebaz</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.ico') }}" />
      <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/backend/css/typography.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/backend/css/responsive.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
      <style>
         .nav-item a{
            color:white !important;
         }
      </style>
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
         @yield('seq_content')
      <!-- Optional JavaScript -->
      <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/jquery.appear.js') }}"></script>
      <script src="{{ asset('assets/backend/js/countdown.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/waypoints.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/jquery.counterup.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/wow.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/slick.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{ asset('assets/backend/js/smooth-scrollbar.js') }}"></script>
      <script src="{{ asset('assets/backend/js/chart-custom.js') }}"></script>
      <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
   </body>
</html>
