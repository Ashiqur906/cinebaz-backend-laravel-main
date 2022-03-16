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

                        @foreach($slider['data'] as $key )
                            @foreach($key->mediaSimilar($key->video_id) as $similer)
                            <li class="slide-item">
                                <div class="block-images position-relative">
                                    <div class="img-box slider-img-box">
                                    @if ($similer->media->featured)
                                        <img data-original="{{ asset('storage/'.$similer->media->featured->small) }}" src="{{ asset('storage/'.$similer->media->featured->small) }}" class="img-fluid" alt="">
                                    @else
                                        <img data-original="{{ asset('assets/frontend/images/noimage-p.png') }}" src="{{ asset('assets/frontend/images/noimage-p.png') }}" class="img-fluid" alt="">
                                    @endif
                                    </div>
                                    <div class="block-description">
                                        <h6>{{ $similer->media->title_en }}</h6>
                                        <div class="movie-time d-flex align-items-center my-2">
                                            <div class="badge badge-secondary p-1 mr-2">{{ $similer->media->age_limit ? $key->SimilarMedia($similer->similar_id)->age_limit : null }}</div>
                                            <span class="text-white">{{ $similer->media->duration ? $similer->media->duration : null }}</span>
                                        </div>
                                        <div class="hover-buttons">
                                            <a href="{{ route('frontend.details', $similer->media->slug) }}">
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
                                                <span onclick="addFavorite({{$similer->media->id}});"
                                                    class="{{ (in_array($similer->media->id, $member['favorites']))? 'active':'' }}">
                                                    <i class="ri-heart-fill"></i></span>
                                                </li>
                                                <li><span onclick="addListing({{$similer->media->id}});"
                                                    class="{{ (in_array($similer->media->id, $member['listing']))? 'active':'' }}">
                                                    <i class="ri-add-line"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endisset
