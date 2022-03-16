@isset($slider['data'])
@if(count($slider['data']) > 0)
<section id="iq-trending" class="s-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="iq-main-header d-flex align-items-center justify-content-between">
                <h4 class="main-title"><a href="#">{{ isset($slider['name'])? $slider['name'] : null }}</a></h4>
                </div>
                <div class="trending-contens">
                    <ul id="trending-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                        <li>
                            @if($slider['data'][0]->media->featuredL)
                            <div class="tranding-block position-relative"
                                style="background-image: url('{{ asset('storage/'.$slider['data'][0]->media->featuredL->full)}}');"
                            >
                            @else
                            <div class="tranding-block position-relative"
                                style="background-image: url('');"
                            >
                            @endif
                                <div class="trending-custom-tab">
                                <div class="tab-title-info position-relative">
                                    <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="pill" href="#trending-data1"
                                            role="tab" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data2" role="tab"
                                            aria-selected="false">Episodes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data3" role="tab"
                                            aria-selected="false">Trailers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data4" role="tab"
                                            aria-selected="false">Similar Like This</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="trending-content">
                                    <div id="trending-data1" class="overview-tab tab-pane fade active show">
                                        <div class="trending-info align-items-center w-100 animated fadeInUp">
                                        <h1 class="slider-text big-title title text-uppercase" 
                                                data-animation-in="fadeInLeft"
                                                data-delay-in="0.6" style="font-weight: bold;font-family: fantasy;letter-spacing: 3px;">
                                                {{$slider['data'][0]->media->title_en}}
                                            </h1>
                                            <div class="d-flex align-items-center text-white text-detail">
                                                <span class="badge badge-secondary p-3">{{ $slider['data'][0]->media->age_limit ? $slider['data'][0]->media->age_limit : null }}</span>
                                                @if($slider['data'][0]->media->series_id)
                                                <span class="ml-3">{{count($get_trand_info::getSessions($slider['data'][0]->media->series_id))}} Seasons</span>
                                                @endif
                                                <span class="ml-3"> Relase Year</span>
                                                <span class="trending-year">{{ $slider['data'][0]->media->release_year ? $slider['data'][0]->media->release_year : null }}</span>
                                            </div>
                                            <div class="d-flex align-items-center series mb-4">
                                                <!-- <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                class="img-fluid" alt=""></a> -->
                                                <span class="text-gold ml-3">Duration : {{ $slider['data'][0]->media->duration ? $slider['data'][0]->media->duration : null }}</span>
                                            </div>
                                            <p class="trending-dec">{!! $slider['data'][0]->media->description_bn ? $slider['data'][0]->media->description_bn : null !!}
                                            </p>
                                            <div class="p-btns">
                                                <div class="d-flex align-items-center p-0">
                                                    <a href="{{ route('frontend.details', $slider['data'][0]->media->slug) }}" class="btn btn-hover mr-2" tabindex="0"><i
                                                        class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                    <a href="javascript:void(0);" onclick="addListing({{$slider['data'][0]->video_id}});" data-id="{{$slider['data'][0]->video_id}}"
                                                        class="{{ (in_array($slider['data'][0]->video_id, $member['listing']))? 'active':'' }} btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                    List</a>
                                                </div>
                                            </div>
                                            <div class="trending-list mt-4">
                                                <div class="text-primary title">
                                                    Starring: 
                                                    <span class="text-body">{{ $slider['data'][0]->media->starring ? $slider['data'][0]->media->starring : null }}</span>
                                                </div>
                                                <div class="text-primary title">Genres: 
                                                    <span class="text-body">
                                                        @foreach($slider['data'][0]->media->genres as $genre)
                                                            {{$genre->title_en.','}}
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <div class="text-primary title">This Is: 
                                                    <span class="text-body">
                                                        @foreach($slider['data'][0]->media->tags as $tag)
                                                            {{$tag->title_en.','}}
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data2" class="overlay-tab tab-pane fade">
                                        <div class="trending-info align-items-center w-100 animated fadeInUp">
                                            <h1 class="slider-text big-title title text-uppercase" 
                                                data-animation-in="fadeInLeft"
                                                data-delay-in="0.6" style="font-weight: bold;font-family: fantasy;letter-spacing: 3px;">
                                                {{$slider['data'][0]->media->title_en}}
                                            </h1>
                                            <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    @if($slider['data'][0]->media->series_id)
                                                    @foreach($get_trand_info::getSessions($slider['data'][0]->media->series_id) as $trand)

                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="{{ route('frontend.details', $trand->slug) }}">
                                                            @if($trand)
                                                                @if($trand->featured)
                                                                <img src="{{ asset('storage/'.$trand->featured->small)}}" class="img-fluid" alt="">
                                                                @else
                                                                <img src="{{ asset('assets/frontend/images/noimage-l.jpg')}}" class="img-fluid" alt="">
                                                                @endif
                                                            @else
                                                                <img src="{{ asset('assets/frontend/images/noimage-l.jpg')}}" class="img-fluid" alt="">
                                                            @endif
                                                            </a>
                                                            <div class="episode-number">{{$loop->index+1}}</div>
                                                            <div class="episode-play-info">
                                                                <div class="episode-play">
                                                                    <a href="{{ route('frontend.details', $trand->slug) }}" tabindex="0"><i class="ri-play-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="{{ route('frontend.details', $trand->slug) }}">{{$trand->title_en}}</a>
                                                            <span class="text-primary">{{$trand->duration}}</span>
                                                            </div>
                                                            <!-- <p class="mb-0">{!! $trand->description_en !!}</p> -->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data3" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <h1 class="slider-text big-title title text-uppercase" 
                                                data-animation-in="fadeInLeft"
                                                data-delay-in="0.6" style="font-weight: bold;font-family: fantasy;letter-spacing: 3px;">
                                                {{$slider['data'][0]->media->title_en}}
                                            </h1>
                                            <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    
                                                @if($slider['data'][0]->media->series_id)
                                                    @foreach($get_trand_info::getSessions($slider['data'][0]->media->series_id) as $trand)
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="{{ route('frontend.details', $trand->slug) }}">
                                                            @if($trand)
                                                                @if($trand->featured)
                                                                <img src="{{ asset('storage/'.$trand->featured->small)}}" class="img-fluid" alt="">
                                                                @else
                                                                <img src="{{ asset('assets/frontend/images/noimage-l.jpg')}}" class="img-fluid" alt="">
                                                                @endif
                                                            @else
                                                                <img src="{{ asset('assets/frontend/images/noimage-l.jpg')}}" class="img-fluid" alt="">
                                                            @endif   
                                                            </a>
                                                            <div class="episode-number">{{$loop->index+1}}</div>
                                                            <div class="episode-play-info">
                                                                <div class="episode-play">
                                                                    <a href="{{ $trand->trailer_url }}" class="video-open playbtn"><i class="ri-play-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="{{ $trand->trailer_url }}" class="video-open playbtn">{{$trand->title_en}}</a>
                                                            <span class="text-primary">{{$trand->duration}}</span>
                                                            </div>
                                                            <!-- <p class="mb-0">{!! $trand->description_en !!}</p> -->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data4" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <h1 class="slider-text big-title title text-uppercase" 
                                                data-animation-in="fadeInLeft"
                                                data-delay-in="0.6" style="font-weight: bold;font-family: fantasy;letter-spacing: 3px;">
                                                {{$slider['data'][0]->media->title_en}}
                                            </h1>
                                            <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                
                                                @foreach($slider['data'][0]->media->similars as $trand)
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="{{ route('frontend.details', $trand->media->slug) }}">
                                                            @if($trand->media->featured)
                                                            <img src="{{ asset('storage/'.$trand->media->featured->small)}}" class="img-fluid" alt="">
                                                            @else
                                                            <img src="{{ asset('assets/frontend/images/noimage-p.png')}}" class="img-fluid" alt="">
                                                            @endif
                                                        </a>
                                                        <div class="episode-number">{{$loop->index+1}}</div>
                                                        <div class="episode-play-info" style="left: 25%;">
                                                            <div class="hover-buttons">
                                                                <a href="{{ route('frontend.details', $trand->media->slug) }}">
                                                                    <span class="btn btn-hover">
                                                                        <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                                        Play Now
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <!-- <div class="episode-play">
                                                                <a href="{{ route('frontend.details', $trand->media->slug) }}" tabindex="0"><i class="ri-play-fill"></i></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="{{ route('frontend.details', $trand->media->slug) }}">{{$trand->media->title_en}}</a>
                                                        <span class="text-primary">{{$trand->media->duration}}</span>
                                                        </div>
                                                        <!-- <p class="mb-0">{!! $trand->media->description_en !!}</p> -->
                                                    </div>
                                                </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tranding-block position-relative"
                                style="">
                                <div class="trending-custom-tab">
                                <div class="tab-title-info position-relative">
                                    <!-- <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="pill" href="#trending-data5"
                                            role="tab" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data6" role="tab"
                                            aria-selected="false">Episodes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data7" role="tab"
                                            aria-selected="false">Trailers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data8" role="tab"
                                            aria-selected="false">Similar
                                            Like This</a>
                                        </li>
                                    </ul> -->
                                </div>
                                <div class="trending-content">
                                    <div id="trending-data5" class="overview-tab tab-pane fade active show">
                                        <!-- <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="res-logo">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="streamit">
                                                </div>
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                            <div class="d-flex align-items-center text-white text-detail">
                                            <span class="badge badge-secondary p-3">15+</span>
                                            <span class="ml-3">2 Seasons</span>
                                            <span class="trending-year">2020</span>
                                            </div>
                                            <div class="d-flex align-items-center series mb-4">
                                            <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                class="img-fluid" alt=""></a>
                                            <span class="text-gold ml-3">#2 in Series Today</span>
                                            </div>
                                            <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                            dummy text ever since the 1500s.
                                            </p>
                                            <div class="p-btns">
                                            <div class="d-flex align-items-center p-0">
                                                <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                    class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                List</a>
                                            </div>
                                            </div>
                                            <div class="trending-list mt-4">
                                            <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                Moura, Boyd Holbrook, Joanna</span>
                                            </div>
                                            <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                Action, Thriller, Biography</span>
                                            </div>
                                            <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                Forceful</span>
                                            </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div id="trending-data6" class="overlay-tab tab-pane fade">
                                        <!-- <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="show-details.html" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                            <div class="iq-custom-select d-inline-block sea-epi">
                                            <select name="cars" class="form-control season-select">
                                                <option value="season1">Season 1</option>
                                                <option value="season2">Season 2</option>
                                            </select>
                                            </div>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div id="trending-data7" class="overlay-tab tab-pane fade">
                                        <!-- <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div id="trending-data8" class="overlay-tab tab-pane fade">
                                        <!-- <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tranding-block position-relative"
                                style="">
                                <div class="trending-custom-tab">
                                <div class="tab-title-info position-relative">
                                    <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="pill" href="#trending-data9"
                                            role="tab" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data10" role="tab"
                                            aria-selected="false">Episodes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data11" role="tab"
                                            aria-selected="false">Trailers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data12" role="tab"
                                            aria-selected="false">Similar
                                            Like This</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="trending-content">
                                    <!-- <div id="trending-data9" class="overview-tab tab-pane fade active show">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="res-logo">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="streamit">
                                                </div>
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase ">the marshal king</h1>
                                            <div class="d-flex align-items-center text-white text-detail">
                                            <span class="badge badge-secondary p-3">11+</span>
                                            <span class="ml-3">3 Seasons</span>
                                            <span class="trending-year">2020</span>
                                            </div>
                                            <div class="d-flex align-items-center series mb-4">
                                            <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                class="img-fluid" alt=""></a>
                                            <span class="text-gold ml-3">#11 in Series Today</span>
                                            </div>
                                            <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                            dummy text ever since the 1500s.
                                            </p>
                                            <div class="p-btns">
                                            <div class="d-flex align-items-center p-0">
                                                <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                    class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                List</a>
                                            </div>
                                            </div>
                                            <div class="trending-list mt-4">
                                            <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                Moura, Boyd Holbrook, Joanna</span>
                                            </div>
                                            <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                Action, Thriller, Biography</span>
                                            </div>
                                            <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                Forceful</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data10" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="show-details.html" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                            <div class="iq-custom-select d-inline-block sea-epi">
                                            <select name="cars" class="form-control season-select">
                                                <option value="season1">Season 1</option>
                                                <option value="season2">Season 2</option>
                                                <option value="season3">Season 3</option>
                                            </select>
                                            </div>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data11" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data12" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tranding-block position-relative"
                                style="">
                                <div class="trending-custom-tab">
                                    <div class="tab-title-info position-relative">
                                        <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data13"
                                                role="tab" aria-selected="true">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data14" role="tab"
                                                aria-selected="false">Episodes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data15" role="tab"
                                                aria-selected="false">Trailers</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data16" role="tab"
                                                aria-selected="false">Similar
                                                Like This</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="trending-content">
                                        <!-- <div id="trending-data13" class="overview-tab tab-pane fade active show">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="res-logo">
                                                    <div class="channel-logo">
                                                        <img src="images/logo.png" class="c-logo" alt="streamit">
                                                    </div>
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase ">Dark Zone</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                <span class="badge badge-secondary p-3">17+</span>
                                                <span class="ml-3">1 Season</span>
                                                <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                    class="img-fluid" alt=""></a>
                                                <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                                dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                <div class="d-flex align-items-center p-0">
                                                    <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                        class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                    <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                    List</a>
                                                </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                    Moura, Boyd Holbrook, Joanna</span>
                                                </div>
                                                <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                    Action, Thriller, Biography</span>
                                                </div>
                                                <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                    Forceful</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data14" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="show-details.html" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                <select name="cars" class="form-control season-select">
                                                    <option value="season1">Season 1</option>
                                                    <option value="season2">Season 2</option>
                                                </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data15" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data16" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tranding-block position-relative"
                                style="">
                                <div class="trending-custom-tab">
                                    <div class="tab-title-info position-relative">
                                        <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data17"
                                                role="tab" aria-selected="true">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data18" role="tab"
                                                aria-selected="false">Episodes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data19" role="tab"
                                                aria-selected="false">Trailers</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data20" role="tab"
                                                aria-selected="false">Similar
                                                Like This</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="trending-content">
                                        <!-- <div id="trending-data17" class="overview-tab tab-pane fade active show">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="res-logo">
                                                    <div class="channel-logo">
                                                        <img src="images/logo.png" class="c-logo" alt="streamit">
                                                    </div>
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                <span class="badge badge-secondary p-3">7+</span>
                                                <span class="ml-3">2 Seasons</span>
                                                <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                    class="img-fluid" alt=""></a>
                                                <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                                dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                <div class="d-flex align-items-center p-0">
                                                    <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                        class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                    <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                    List</a>
                                                </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                    Moura, Boyd Holbrook, Joanna</span>
                                                </div>
                                                <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                    Action, Thriller, Biography</span>
                                                </div>
                                                <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                    Forceful</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data18" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="show-details.html" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                <select name="cars" class="form-control season-select">
                                                    <option value="season1">Season 1</option>
                                                    <option value="season2">Season 2</option>
                                                </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data19" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="trending-data20" class="overlay-tab tab-pane fade">
                                            <div
                                                class="trending-info align-items-center w-100 animated fadeInUp">
                                                <a href="javascript:void(0);" tabindex="0">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="stramit">
                                                </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                                <div class="episodes-contens mt-4">
                                                <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">1</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 1</a>
                                                            <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">2</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 2</a>
                                                            <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">3</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 3</a>
                                                            <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">4</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 4</a>
                                                            <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="e-item">
                                                        <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-number">5</div>
                                                            <div class="episode-play-info">
                                                            <div class="episode-play">
                                                                <a href="show-details.html" tabindex="0"><i
                                                                    class="ri-play-fill"></i></a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="episodes-description text-body mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                            <a href="show-details.html">Episode 5</a>
                                                            <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- <li>
                            <div class="tranding-block position-relative"
                                style="background-image: url(images/trending/06.jpg);">
                                <div class="trending-custom-tab">
                                <div class="tab-title-info position-relative">
                                    <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="pill" href="#trending-data21"
                                            role="tab" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data22" role="tab"
                                            aria-selected="false">Episodes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data23" role="tab"
                                            aria-selected="false">Trailers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#trending-data24" role="tab"
                                            aria-selected="false">Similar
                                            Like This</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="trending-content">
                                    <div id="trending-data21" class="overview-tab tab-pane fade active show">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="res-logo">
                                                <div class="channel-logo">
                                                    <img src="images/logo.png" class="c-logo" alt="streamit">
                                                </div>
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                            <div class="d-flex align-items-center text-white text-detail">
                                            <span class="badge badge-secondary p-3">17+</span>
                                            <span class="ml-3">2 Seasons</span>
                                            <span class="trending-year">2020</span>
                                            </div>
                                            <div class="d-flex align-items-center series mb-4">
                                            <a href="javascript:void(0);"><img src="images/trending/trending-label.png"
                                                class="img-fluid" alt=""></a>
                                            <span class="text-gold ml-3">#2 in Series Today</span>
                                            </div>
                                            <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                            dummy text ever since the 1500s.
                                            </p>
                                            <div class="p-btns">
                                            <div class="d-flex align-items-center p-0">
                                                <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                    class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                List</a>
                                            </div>
                                            </div>
                                            <div class="trending-list mt-4">
                                            <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                Moura, Boyd Holbrook, Joanna</span>
                                            </div>
                                            <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                Action, Thriller, Biography</span>
                                            </div>
                                            <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                Forceful</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data22" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="show-details.html" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                            <div class="iq-custom-select d-inline-block sea-epi">
                                            <select name="cars" class="form-control season-select">
                                                <option value="season1">Season 1</option>
                                                <option value="season2">Season 2</option>
                                            </select>
                                            </div>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data23" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="watch-video.html" target="_blank">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="trending-data24" class="overlay-tab tab-pane fade">
                                        <div
                                            class="trending-info align-items-center w-100 animated fadeInUp">
                                            <a href="javascript:void(0);" tabindex="0">
                                            <div class="channel-logo">
                                                <img src="images/logo.png" class="c-logo" alt="stramit">
                                            </div>
                                            </a>
                                            <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                            <div class="episodes-contens mt-4">
                                            <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/01.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">1</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 1</a>
                                                        <span class="text-primary">2.25 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/02.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">2</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 2</a>
                                                        <span class="text-primary">3.23 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/03.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">3</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 3</a>
                                                        <span class="text-primary">2 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/04.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">4</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 4</a>
                                                        <span class="text-primary">1.12 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="e-item">
                                                    <div class="block-image position-relative">
                                                        <a href="show-details.html">
                                                        <img src="images/episodes/05.jpg" class="img-fluid" alt="">
                                                        </a>
                                                        <div class="episode-number">5</div>
                                                        <div class="episode-play-info">
                                                        <div class="episode-play">
                                                            <a href="show-details.html" tabindex="0"><i
                                                                class="ri-play-fill"></i></a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="episodes-description text-body mt-2">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                        <a href="show-details.html">Episode 5</a>
                                                        <span class="text-primary">2.54 m</span>
                                                        </div>
                                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>
@endif
@endisset