@extends('frontend::layouts.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<style>
.block-description > h6 {
    font-size: 1em;
}
</style>
<!-- MainContent -->
<section id="iq-upcoming-movie" style="padding-top: 100px;">
@isset($listing)
    <div class="row">
        <div class="col-sm-12 overflow-hidden">
            <div class="upcoming-contens">
                @include('frontend::layouts.part.slider_favorites',['slider' => $lastWatch])  
            </div>
        </div>
    </div>
@endisset
</section>
<section id="iq-upcoming-movie">
@isset($listing)
    <div class="row">
        <div class="col-sm-12 overflow-hidden">
            <div class="upcoming-contens">
                <!-- Favorite Movie Slider Start -->
                @include('frontend::layouts.part.slider_favorites',['slider' => $listing])
                <!-- Favorite Movie Slider End -->
            </div>
        </div>
    </div>
@endisset
</section>
<section id="iq-list-movie">
@isset($favorites)
    <div class="row">
        <div class="col-sm-12 overflow-hidden">
            <div class="upcoming-contens">
                <!-- listing Movie Slider Start -->
                @include('frontend::layouts.part.slider_favorites',['slider' => $favorites])
                <!-- listing Movie Slider End -->
            </div>
        </div>
    </div>
@endisset
</section>
<!-- MainContent End-->
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