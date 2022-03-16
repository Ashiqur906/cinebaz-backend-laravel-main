<section id="iq-topten">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="iq-main-header d-flex align-items-center justify-content-between">
                <h4 class="main-title topten-title-sm">Top Ten</h4>
                </div>
                <div class="topten-contens">
                <h4 class="main-title topten-title">Top Ten</h4>
                <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                    @foreach($slider['data'] as $topTen)
                    <li>
                        <a href="{{ route('frontend.details', $topTen->media->slug) }}">
                            <img src="{{asset($topTen->media->featured ? 'storage/'.$topTen->media->featuredL->full : 'assets/frontend/images/noimage-l.png')}}" class="img-fluid w-100" alt="">
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="vertical_s">
                    <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                    @foreach($slider['data'] as $top)
                        <li>
                            <div class="block-images position-relative">
                            <a href="{{ route('frontend.details', $top->media->slug) }}">
                                <img src="{{asset( $top->media->featured ? 'storage/'.$top->media->featuredL->small : 'assets/frontend/images/noimage-l.png' )}}" class="img-fluid w-100" alt="">
                            </a>
                            <div class="block-description">
                                <h5>{{$top->media->title_en}}</h5>
                                <div class="movie-time d-flex align-items-center my-2">
                                    <div class="badge badge-secondary p-1 mr-2">{{ $top->media->age_limit ? $top->media->age_limit : null }}</div>
                                    <span class="text-white">{{$top->media->duration}}</span>
                                </div>
                                <div class="hover-buttons">
                                    <a href="{{ route('frontend.details', $top->media->slug) }}" class="btn btn-hover" tabindex="0">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                    </a>
                                </div>
                            </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>