@extends('frontend::layouts.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
   
    <!-- Slider Start -->
        {{-- @include('frontend::layouts.part.slider_home',['slider' => null]) --}}
   @php 
      if(isset($mdata->featuredL->full)){
         $bg = 'storage/'.$mdata->featuredL->full;
      }elseif(isset($mdata->featuredL->small)) {
         $bg = 'storage/'.$mdata->featuredL->small;
      }else {
         $bg = null;
      }
      //  @dump($bg)
   @endphp
@isset($mdata)
   <section class="banner-wrapper overlay-wrapper iq-main-slider" 
      style="background-image: url('{{ ($bg)? asset($bg) : null}}');">
      @if (auth('member')->check())
         @if($mdata->premium)
         <div class="banner-caption">
            @if(auth('member')->user()->membership_id)
            <div class="position-relative mb-4">
               <a href="{{route('frontend.show',$mdata->slug)}}" class="d-flex align-items-center">
                  <div class="play-button">
                     <i class="fa fa-play"></i>
                  </div>
                  <h4 class="w-name text-white font-weight-700">
                  Watch </h4>
               </a>
            </div>
            @endif
            <ul class="list-inline p-0 m-0 share-icons music-play-lists">
               <li><span><i class="ri-add-line"></i></span></li>
               <li>
                  <span onclick="addFavorite(this);" 
                     data-id="{{$mdata->id}}" 
                     data-route="#" 
                     class="{{ (in_array($mdata->id, $member['favorites']))? 'active':'' }}">
                     <i class="ri-heart-fill"></i>
                  </span>
               </li>
               <li class="share">
                  <span><i class="ri-share-fill"></i></span>
                  <div class="share-box">
                     <div class="d-flex align-items-center">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url('details',$mdata->slug)}}&display=popup" class="share-ico" target="_blank"><i class="ri-facebook-fill"></i></a>
                        <a href="https://twitter.com/intent/share?url={{urlencode(url('details',$mdata->slug))}}" class="share-ico"><i class="ri-twitter-fill"></i></a>
                        <a href="#" class="share-ico" onclick="Copy({{url('details',$mdata->slug)}})"><i class="ri-links-fill"></i></a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         @if(!auth('member')->user()->membership_id)
         <div class="exeptionlogin-caption" style="width: 100%;top: 25%;">
            <div class="position-relative mb-12">
               <div class="exeptionlogin">
                  <div class="hover-buttons" style="padding-bottom:15px;">
                     <a href="{{ route('frontend.plan') }}">
                        <h3 class="btn btn-hover" style="font-size:14px;">
                           Subscribe
                        </h3>
                     </a>
                  </div>
                  <h4>OOps! It`s premiam.</h4>
                  <p>Please Subscribe for Premiam Videoa.</p>
               </div>
            </div>
         </div>
         @endif
         @else
         <div class="banner-caption" style="width: 50%;">
            <div>
               @if($mdata->featured)
               <img src="{{asset('storage/'.$mdata->featured->small)}}" style="height:182px;float:left;padding:15px;">
               @endif
               <h1 class="trending-text big-title text-uppercase mt-0">{{strtoupper($mdata ->title_en)}} </h1>
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
               <ul class="p-0 list-inline d-flex align-items-center movie-content">
                  <li>
                     <a href="{{route('frontend.show',$mdata->slug)}}" class="d-flex align-items-center">
                        <div class="play-button">
                           <i class="fa fa-play"></i>
                        </div>
                        <h4 class="w-name text-white font-weight-700">
                        Watch </h4>
                     </a>
                  </li>
               </ul>
            </div>
            <ul class="list-inline p-0 m-0 share-icons music-play-lists">
               <li><span><i class="ri-add-line"></i></span></li>
               <li>
                  <span onclick="addFavorite(this);" 
                     data-id="{{$mdata->id}}" 
                     data-route="#" 
                     class="{{ (in_array($mdata->id, $member['favorites']))? 'active':'' }}">
                     <i class="ri-heart-fill"></i>
                  </span>
               </li>
               <li class="share">
                  <span><i class="ri-share-fill"></i></span>
                  <div class="share-box">
                     <div class="d-flex align-items-center">
                     <a href="https://www.facebook.com/sharer/sharer.php?u={{url('details',$mdata->slug)}}&display=popup" class="share-ico" target="_blank"><i class="ri-facebook-fill"></i></a>
                        <a rel="canonical" href="https://twitter.com/intent/share?url={{urlencode(url('details',$mdata->slug))}}" class="share-ico" target="_blank"><i class="ri-twitter-fill"></i></a>
                        <a href="#" class="share-ico" onclick="Copy('{{url('details',$mdata->slug)}}')"><i class="ri-links-fill"></i></a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         @endif
      @else
         <div class="exeptionlogin-caption" style="width: 100%">
            <div class="position-relative mb-12">
               <div class="exeptionlogin">
                  <div class="hover-buttons">
                     <a href="{{route('frontend.show',$mdata->slug)}}">
                        <span class="btn btn-hover">
                           Login
                        </span>
                     </a>
                     <a href="{{ route('member.auth.register') }}">
                        <span class="btn btn-hover">
                           Register
                        </span>
                     </a>
               </div>
               <p>Subscribe to see more premium content including this content or log in if you have subscribed!</p>
               </div>
            </div>
         </div>
      @endif
   </section>
   <!-- Slider End -->
   <div class="main-content">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info g-border">
                  <div>
                  @if($mdata->featured)
                     <img src="{{asset('storage/'.$mdata->featured->small)}}" style="height:182px;float:left;padding:15px;">
                  @endif
                     <h1 class="trending-text big-title text-uppercase mt-0">{{strtoupper($mdata ->title_en)}} </h1>
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
                  </div>
                  
                  <div class="d-flex align-items-center text-white text-detail">
                     @if($mdata->age_limit)
                     <span class="badge badge-secondary p-3">{{$mdata->age_limit}}</span>
                     @endif
                     <span class="trending-year">#Release : {{$mdata->release_year}}</span>
                     <span class="ml-3">#Duration : {{$mdata->duration}}</span>
                  </div>
                  <!-- <div class="d-flex align-items-center series mb-4">
                     <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid" alt=""></a>
                     <span class="text-gold ml-3">{{$mdata->duration}}</span>
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
      @include('frontend::layouts.part.slider_simier',['slider' => $similer])
      @include('frontend::layouts.part.slider_section',['slider' => $recomended])
      @include('frontend::layouts.part.slider_section',['slider' => $upcoming])
   </div>
@endisset
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
   <script type="text/javascript">
      function Copy(link_url) 
         {
            var copyText = link_url;

            document.addEventListener('copy', function(e) {
               e.clipboardData.setData('text/plain', copyText);
               e.preventDefault();
            }, true);

            document.execCommand('copy');  
            alert('copied text: ' + copyText); 
         }
    </script>
    <script>
        $("img").lazyload({effect: "slideDown"}); 
    </script>
@endpush
