
@isset($sdata)
    <li class="slide-item">
        <div class="block-images position-relative">
            <div class="img-box slider-img-box">
                @if (count($sdata->images)>0)
                    <img data-original="{{ asset($sdata->images[0]->small) }}" src="{{ asset($sdata->images[0]->small) }}" class="img-fluid" alt="">
                @else
                    <img data-original="{{ asset('assets/frontend/images/noimage-p.png') }}" src="{{ asset('assets/frontend/images/noimage-p.png') }}" class="img-fluid" alt="">
                @endif
            </div>
            <div class="block-description">
                <h6>{{ $sdata->title_english }}</h6>
                @if($sdata->category_nature == 1)
                <p>Movie</p>
                @else
                <p>TV-Show</p>
                @endif
                <div class="hover-buttons">
                    <a href="{{ route('frontend.media_list', $sdata->id) }}">
                        <span class="btn btn-hover">
                            <i class="fa fa-arrow-right mr-1" aria-hidden="true"></i>
                            details
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </li>
@endisset

