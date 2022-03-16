@isset($slider['data'])
@if(count($slider['data']) > 0)
<section id="iq-favorites" style="padding-top: 17px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="iq-main-header d-flex align-items-center justify-content-between">
                    <h4 class="main-title"><a href="javascript:void(0);">{{ isset($slider['name'])? $slider['name'] : null }}</a></h4>
                </div>
                <div class="favorites-contens">
                    <ul class="favorites-slider list-inline  row p-0 mb-0">

                        @foreach($slider['data'] as $sdata )
                         <!-- Favorite Movie Slider Start -->
                         <li class="slide-item">
                            <div class="block-images position-relative">
                                <div class="img-box slider-img-box">
                                    @if ($sdata->media->featured)
                                        <img data-original="{{ asset('storage/'.$sdata->media->featured->full) }}" src="{{ asset('storage/'.$sdata->media->featured->full) }}" class="img-fluid" alt="">
                                    @else
                                        <img data-original="{{ asset('assets/frontend/images/favorite/01.jpg') }}" src="{{ asset('assets/frontend/images/favorite/01.jpg') }}" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="block-description">
                                    <h6>{{ $sdata->media->title_en }}</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <div class="badge badge-secondary p-1 mr-2">{{ $sdata->media->age_limit ? $sdata->media->age_limit : null }}</div>
                                        <span class="text-white">{{ $sdata->media->duration ? $sdata->media->duration : null }}</span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('frontend.details', $sdata->media->slug) }}">
                                            <span class="btn btn-hover">
                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                Play Now
                                            </span>
                                        </a>
                                    </div>
                                
                                    @if(auth('member')->check())
                                    <div class="block-social-info">
                                        <ul class="list-inline p-0 m-0 music-play-lists">

                                            <li>
                                            <span onclick="addFavorite({{$sdata->id}});"
                                                class="{{ (in_array($sdata->id, $member['favorites']))? 'active':'fevourit' }}">
                                                <i class="ri-heart-fill"></i></span>
                                            </li>
                                            <li>
                                                <span onclick="addListing({{$sdata->similar_id}});"
                                                class="{{ (in_array($sdata->id, $member['favorites']))? 'active':'fevourit' }}">
                                                <i class="ri-heart-fill"></i></span>    
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <!-- Favorite Movie Slider End -->
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endisset
