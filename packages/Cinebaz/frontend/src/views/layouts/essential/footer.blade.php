<footer class="mb-0">
    <div class="container-fluid">
        <div class="block-space">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <ul class="d-flex align-items-center list-inline">
                    @foreach (cz_menu('Footer Menu') as $list)
                        <li style="padding-right:20px"><a href="{{ $list['link'] }}">{{ $list['label'] }}</a></li>
                        <!-- <li style="padding-right:20px"><a href="#">Privacy-Policy</a></li>
                        <li style="padding-right:20px"><a href="#">FAQ</a></li>
                        <li style="padding-right:20px"><a href="#">Watch List</a></li> -->
                    @endforeach
                    </ul>
                    <p>
                        {!! cz_setting('footer-about') !!}
                    </p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <ul class="f-link list-unstyled mb-15">
                        <li><a href="#">Cinebaz App</a></li>
                    </ul>
                    <div class="row">
                        @if(cz_setting('playstore'))
                        <div class="col-lg-6 col-md-12">
                            <a href="{{cz_setting('playstore-url')}}">
                                <img src="{{cz_setting('playstore')}}" />
                            </a>
                        </div>
                        @endif
                        @if(cz_setting('appstore'))
                        <div class="col-lg-6 col-md-12">
                            <a href="{{cz_setting('appstore-url')}}">
                                <img src="{{cz_setting('appstore')}}" />
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 r-mt-15">
                    <ul class="f-link list-unstyled mb-15">
                        <li><a href="#">Follow Us</a></li>
                    </ul>
                    <div class="">
                        <a href="{{cz_setting('facebook')}}" class="s-icon" style="padding: 10px;">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="{{cz_setting('twitter')}}" class="s-icon" style="padding: 10px;">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="{{cz_setting('linkedin')}}" class="s-icon" style="padding: 10px;">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="{{cz_setting('google')}}" class="s-icon" style="padding: 10px;">
                            <i class="ri-google-fill"></i>
                        </a>
                        <a href="{{cz_setting('instagram')}}" class="s-icon" style="padding: 10px;">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright py-2">
        <div class="container-fluid">
            <p class="mb-0 text-center font-size-14 text-body">{{cz_setting('Copyritght')}}</p>
        </div>
    </div>
</footer>
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-lg-6">
                <ul class="list-inline mb-0">

                    @foreach (cz_menu('Footer Menu') as $list)
                        <li class="list-inline-item">
                            <a href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                        </li>
                    @endforeach


                </ul>
            </div> -->
            <div class="col-lg-6 text-right">
                {!! cz_setting('site-copyright') !!}
            </div>
        </div>
    </div>
</footer>

<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
</div>
