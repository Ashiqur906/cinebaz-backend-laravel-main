<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="{{ url('/admin') }}" class="header-logo">
                        @if (cz_setting('site-logo'))
                            <img class="img-fluid rounded-normal" src="{{ cz_setting('site-logo') }}" class="img-fluid rounded-normal" alt="streamit" />
                        @else
                            <img class="img-fluid rounded-normal" src="{{ asset('assets/frontend/images/logo.png') }}" class="img-fluid rounded-normal"
                                alt="streamit" />
                        @endif
                    </a>
                </div>
            </div>
            <div class="iq-search-bar ml-auto">
                <form action="#" class="searchbox">
                    <input type="text" class="text search-input" placeholder="Search Here...">
                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon search-content">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                            <i class="ri-search-line"></i>
                        </a>
                        <form action="#" class="search-box p-0">
                            <input type="text" class="text search-input" placeholder="Type here to search...">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </form>
                    </li>
                   
                    <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                            
                            @if(count(auth('web')->user()->images) > 0)
                            <img src="{{asset(auth('web')->user()->images[0]->small)}}" class="img-fluid rounded-circle mr-3" alt="{{auth('web')->user()->name}}" id="image">
                            @else
                            <img src="{!! asset('assets/backend/images/user/1.jpg') !!}" class="img-fluid rounded-circle mr-3" alt="user">
                            @endif
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        @if(auth('web')->user())
                                        <h5 class="mb-0 text-white line-height">Hello {{ auth('web')->user()->name }}
                                        </h5>
                                        @endif
                                        <span class="text-white font-size-12">Available</span>
                                    </div>
                                    <a href="{{route('admin.index')}}" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">My Profile</h6>
                                                <p class="mb-0 font-size-12">View personal profile details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.edit')}}" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                <p class="mb-0 font-size-12">Modify your personal details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- <a href="{{ route('admin.register') }}" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-settings-fill"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Register</h6>
                                                <p class="mb-0 font-size-12">Manage your site Registration
                                                    privacy.</p>
                                            </div>
                                        </div>
                                    </a> -->
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a href="{{ route('admin.logout') }}"
                                            class="bg-primary iq-sign-btn" role="button">
                                            Sign out
                                            <i class="ri-login-box-line ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>