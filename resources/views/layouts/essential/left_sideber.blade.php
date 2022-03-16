
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ url('/admin') }}" class="header-logo">
            @if (cz_setting('site-logo'))
                <img class="img-fluid rounded-normal" src="{{ cz_setting('site-logo') }}" alt="streamit" />
            @else
                <img class="img-fluid rounded-normal" src="{{ asset('assets/frontend/images/logo.png') }}"
                    alt="streamit" />
            @endif

        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <!-- <li>
                    <a href="#" class="text-primary" target="_blank">
                        <i class="ri-arrow-right-line"></i><span>Visit site</span>
                    </a>
                </li> -->
                <li><a href="{{ route('dashboard') }}" class="iq-waves-effect"><i
                            class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
           
                @if (function_exists('is_admin'))
                    @include('admin::menu.index')     
                @endif

                @if (function_exists('is_page'))
                    @include('page::menu.index')
                @endif
              
                @if (function_exists('is_media'))
                    @include('media::menu.index')
                @endif
                @if (function_exists('is_artist'))
                   @include('artist::menu.index')
                @endif
                @if (function_exists('is_order'))
                    @include('order::menu.index')
                @endif
                @if (function_exists('is_category'))
                    @include('category::menu.index')
                @endif

                @if (function_exists('is_season'))
                    @include('season::menu.index')
                @endif
                @if (function_exists('is_series'))
                    @include('series::menu.index')
                @endif
                @if (function_exists('is_tag'))
                    @include('tag::menu.index')
                @endif
                @if (function_exists('is_genre'))
                    @include('genre::menu.index')
                @endif
                @if (function_exists('is_banner'))
                    @include('banner::menu.index')
                @endif
                @if (function_exists('is_member'))
                    @include('member::menu.index')
                @endif  
                @if (function_exists('is_notification'))
                    @include('notification::menu.index')
                @endif
                @if (function_exists('is_permissions'))
                    @include('permissions::menu.index')
                @endif
                @if (function_exists('is_seo'))
                    @include('seo::menu.index')
                @endif
                @if (function_exists('is_setting'))
                    @include('setting::menu.index')
                @endif
                @if (function_exists('is_pricing'))
                    @include('pricing::menu.index')
                @endif
            </ul>
        </nav>
    </div>
</div>
