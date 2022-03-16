@extends('frontend::layouts.master')

@section('content')
   
    <!-- Slider Start -->
        {{-- @include('frontend::layouts.part.slider_home',['slider' => null]) --}}
        
       
    <div id="embedBox" style="width:100%;max-width:100%;height:100vh;"></div>
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">
        <section class="movie-detail container-fluid">
           <div class="row">
              <div class="col-lg-12">
                 <div class="trending-info g-border">
                    @if($mdata->featured)
                        <img src="{{asset('storage/'.$mdata->featured->small)}}" style="height:182px;float:left;padding:15px;">
                    @endif
                    <h1 class="trending-text big-title text-uppercase mt-0">{{strtoupper($mdata ->title_en)}}</h1>
                    <ul class="p-0 list-inline d-flex align-items-center movie-content">
                        {{-- @dump($mdata) --}}
                        @foreach ($mdata->tags as $list)
                        <li class="text-white">
                            {{ $list->title_en}}
                        </li>
                        @endforeach

                        @foreach ($mdata->categories as $list)
                        <li class="text-white">
                            {{ $list->title_english}}
                        </li>
                        @endforeach
                      
                    </ul>
                    <div class="d-flex align-items-center text-white text-detail">
                        @if($mdata->age_limit)
                       <span class="badge badge-secondary p-3">{{$mdata->age_limit}}</span>
                       @endif
                       <span class="trending-year">#Release : {{$mdata->release_year}}</span>
                       <span class="ml-3">#Duration : {{$mdata->duration}}</span>
                    </div>
                    <!-- <div class="d-flex align-items-center series mb-4">
                       <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid" alt=""></a>
                       <span class="text-gold ml-3">#2 in Series Today</span>
                    </div> -->
                   
                    @if($mdata->description_en)
                    <p class="trending-dec w-100 mb-0">
                        {!! $mdata->description_en !!}
                    </p>
                    @endif
                 </div>
              </div>
           </div>
        </section>
     </div>
@endsection
@push('scripts')
<script>
   (function(v,i,d,e,o){v[o]=v[o]||{}; v[o].add = v[o].add || function V(a){
   (v[o].d=v[o].d||[]).push(a);};if(!v[o].l) { v[o].l=1*new Date();
   a=i.createElement(d); m=i.getElementsByTagName(d)[0]; a.async=1; a.src=e;
   m.parentNode.insertBefore(a,m);}})(window,document,"script",
   "https://player.vdocipher.com/playerAssets/1.6.10/vdo.js","vdo");
   vdo.add({
      otp: "{{ $otp }}",
      playbackInfo: "{{ $playbackInfo }}",
      theme: "9ae8bbe8dd964ddc9bdb932cca1cb59a",
      container: document.querySelector( "#embedBox" ),
   });
  </script>
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
