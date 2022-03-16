@isset($slider)
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<style>
    .content {
        position: relative;
        width: 100%;
        margin: auto;
        overflow: hidden;
        margin-bottom:30px;
    }

    .content .content-overlay {
        background: rgba(0,0,0,0.7);
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        -webkit-transition: all 0.4s ease-in-out 0s;
        -moz-transition: all 0.4s ease-in-out 0s;
        transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay{
        opacity: 1;
    }

    .content-image{
        width: 100%;
    }

    .content-details {
        position: absolute;
        text-align: center;
        padding-left: 1em;
        padding-right: 1em;
        width: 100%;
        top: 50%;
        left: 50%;
        opacity: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details{
        top: 50%;
        left: 50%;
        opacity: 1;
    }

    .content-details h3{
        color: #fff;
        font-weight: 500;
        letter-spacing: 0.15em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
    }

    .content-details p{
        color: #fff;
        font-size: 0.8em;
    }

    .fadeIn-bottom{
        top: 80%;
    }

    .fadeIn-top{
        top: 20%;
    }

    .fadeIn-left{
        left: 20%;
    }

    .fadeIn-right{
        left: 80%;
    }
    .fevourit{
        padding: 8px 7px 7px 8px;
        background-color: white;
        color: red;
        border-radius: 50px;
        font-size: 18px;
        border: 7px solid #0000008f;
    }
    .listing{
        padding: 6px 9px 7px 8px;
        background-color: white;
        color: red;
        border-radius: 50px;
        font-size: 18px;
        border: 7px solid #0000008f;
    }
    .active{
        padding: 8px 7px 7px 8px;
        background-color: red;
        color: white;
        border-radius: 50px;
        font-size: 18px;
        border: 7px solid #0000008f;
    }
</style>
<section id="iq-favorites" style="padding-top: 17px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="iq-main-header d-flex align-items-center justify-content-between">
                    <h4 class="main-title">
                        <a href="javascript:void(0);">{{ isset($slider)? $slider->title_en : null }}</a>
                    </h4>
                </div>
                <div class="favorites-contens">
                    <div class="row p-0 mb-0">
                        @foreach($slider->medias as $sdata)
                        @isset($sdata)
                        <div class="col-lg-2">
                            <div class="content">
                                <a href="#" target="_blank">
                                    <div class="content-overlay"></div>
                                    @if ($sdata->featured)
                                        <img data-original="{{ asset('storage/'.$sdata->featured->full) }}" src="{{ asset('storage/'.$sdata->featured->full) }}" class="img-fluid" alt="">
                                    @else
                                        <img data-original="{{ asset('assets/frontend/images/favorite/01.jpg') }}" class="img-fluid" alt="">
                                    @endif
                                    <div class="content-details fadeIn-bottom">
                                        <h4 class="content-title">{{ $sdata->title_en }}</h4>

                                        <div class="badge badge-secondary p-1 mr-2">{{ $sdata->age_limit ? $sdata->age_limit : null }}</div>
                                        <span class="text-white">{{ $sdata->duration ? $sdata->duration : null }}</span>
                                        <a href="{{ route('frontend.details', $sdata->slug) }}">
                                            <span class="btn btn-hover">
                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                Play Now
                                            </span>
                                        </a>
                                        <br><br>
                                        @if(auth('member')->check())
                                        <a href="#" onclick="addFavorite({{$sdata->id}});"class="{{ (in_array($sdata->id, $member['favorites']))? 'active':'fevourit' }}">
                                                <i class="ri-heart-fill"></i>
                                        </a>
                                        <a href="#" onclick="addListing({{$sdata->id}});" class="{{ (in_array($sdata->id, $member['listing']))? 'active':'listing' }} ">
                                            <i class="ri-add-line"></i>
                                        </a>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endisset
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
   $("img").lazyload({effect: "slideDown"}); 
</script>
@endisset