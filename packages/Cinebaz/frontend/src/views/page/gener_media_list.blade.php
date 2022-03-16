@extends('frontend::layouts.master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
    <!-- MainContent -->
    <div class="main-content" style="padding-top:70px;">
        
        @include('frontend::layouts.part.gener_details',['slider' => $gener_media_list])

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
