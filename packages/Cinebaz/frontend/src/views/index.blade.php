@extends('frontend::layouts.master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
    <!-- Slider Start -->
    @include('frontend::layouts.part.slider_home',['slider' => $slider])
    <!-- Slider End -->

    <!-- MainContent -->

    <div class="main-content">
        <!--Categories Slider Start -->
        @include('frontend::layouts.part.categories',['slider' => $categories])
        <!-- Categories Slider End -->

        <!-- History Movie Slider Start -->
        @include('frontend::layouts.part.slider_favorites',['slider' => $history])
        <!-- History Movie Slider End -->
        <!-- Upcoming Movie Slider Start -->
        @include('frontend::layouts.part.slider_section',['slider' => $upcoming])
        <!-- Upcoming Movie Slider End -->

        <!-- TV TopTen Movie Slider Start -->
        @include('frontend::layouts.part.topten',['slider' => $toten])
        <!-- TV TopTen Movie Slider End -->

        @if($suggested['data'])
        <!-- Suggested Movie Slider Start -->
        @include('frontend::layouts.part.slider_suggested',['slider' => $sdata, 'suggested' => $suggested['data']])
        <!-- Suggested Movie Slider End -->
        @else
        @include('frontend::layouts.part.slider_section',['slider' => $sdata, 'suggested' => $suggested['data']])
        @endif
        <!-- Peralax Slider Start -->
        @include('frontend::layouts.part.slider_parallex',['slider' => $secound_slider])
        <!-- Peralax Slider End -->

        <!-- listing Movie Slider Start -->
        @include('frontend::layouts.part.slider_favorites',['slider' => $listing])
        <!-- listing Movie Slider End -->

        <!-- Trending Movie Slider Start -->
        @include('frontend::layouts.part.tranding',['slider' => $trending])
        <!-- Trending Movie Slider End -->
        <!-- Favorite Movie Slider Start -->
        @include('frontend::layouts.part.slider_favorites',['slider' => $favorites])
        <!-- Favorite Movie Slider End -->
        
    </div>
    <script>
        $("img").lazyload({effect: "slideDown"}); 
    </script>
@endsection
@push('scripts')
    <style>
        .makeupinstation {
            display: block;
        }

        .makeupinstation small {
            color: #9E9E9E;
            font-weight: 200;
        }
    </style>
@endpush
