<!doctype html>
<html lang="en">

<head>
    @include('layouts.essential.seo')
    @include('layouts.essential.css')
    @stack('headcss')
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        
            <!-- Sidebar-->
            @include('layouts.essential.left_sideber')

            <!-- TOP Nav Bar -->
            @include('layouts.essential.header')
        
        <!-- TOP Nav Bar END -->

        @yield('content')


    </div>
    <!-- Wrapper END -->
    <!-- Footer -->


    @if(Auth::user())
        @include('layouts.essential.footer')
    @endif
    @include('layouts.essential.js')
    @stack('scripts')
</body>

</html>
