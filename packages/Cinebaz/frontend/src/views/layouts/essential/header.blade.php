
<header id="main-header">
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon" data-toggle="collapse">
                                <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                            </div>
                        </a>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if (cz_setting('site-logo'))
                                <img class="img-fluid logo" src="{{ cz_setting('site-logo') }}" alt="streamit" />
                            @else
                                <img class="img-fluid logo" src="{{ asset('assets/frontend/images/logo.png') }}"
                                    alt="streamit" />
                            @endif
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="menu-main-menu-container">
                                <ul id="top-menu" class="navbar-nav ml-auto">
                                    <!-- @foreach (cz_menu('Top Menu') as $list)
                                        <li class="menu-item">
                                            @if (empty($list['child']))
                                                <a href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                                            @else
                                                <a href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                                                <ul class="sub-menu">
                                                    @foreach ($list['child'] as $list)
                                                        <li class="menu-item">
                                                            @if (empty($list['child']))
                                                                <a
                                                                    href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                                                            @else
                                                                <a
                                                                    href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                                                                <ul class="sub-menu">
                                                                    @foreach ($list['child'] as $list)
                                                                        <li class="menu-item">
                                                                            <a href="{{ $list['link'] }}">{{ $list['label'] }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach -->
                                    <li class="menu-item">
                                        <a href="{{route('frontend.index')}}">Home</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('frontend.tv_show')}}">TV-Show</a>
                                        <ul class="sub-menu">
                                            @foreach(TVShow() as $tvShow_nav) 
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.media_list', $tvShow_nav->id) }}">{{$tvShow_nav->title_english}}</a>
                                                <!-- <ul class="sub-menu" style="left: 100%;">
                                                    <li class="menu-item">
                                                        <a href="#">Genar</a>
                                                    </li>
                                                </ul> -->
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('frontend.movie')}}">Movies</a>
                                        <ul class="sub-menu">
                                            @foreach(Movies() as $movie_nav) 
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.media_list', $movie_nav->id) }}">{{$movie_nav->title_english}}</a>
                                                <!-- <ul class="sub-menu" style="left: 100%;">
                                                    <li class="menu-item">
                                                        <a href="#">Genar</a>
                                                    </li>
                                                </ul> -->
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Gener</a>
                                        <ul class="sub-menu">
                                            @foreach(Gener() as $gener_nav) 
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.gener.media_list', $gener_nav->id) }}">{{$gener_nav->title_en}}</a>
                                                <!-- <ul class="sub-menu" style="left: 100%;">
                                                    <li class="menu-item">
                                                        <a href="#">Genar</a>
                                                    </li>
                                                </ul> -->
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile-more-menu">
                            <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                                data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-line"></i>
                            </a>
                            <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                <div class="navbar-right position-relative">
                                    <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                        <!-- <li>
                                            <a href="#" class="search-toggle">
                                                <i class="ri-search-line"></i>
                                            </a>
                                            <div class="search-box iq-search-bar">
                                                <div class="form-group position-relative">
                                                    <input type="text" id="goSearchMobile" class="text search-input font-size-12" placeholder="type here to search...">
                                                    <i class="search-link ri-search-line"></i>
                                                </div>
                                            </div>
                                        </li> -->
                                        <li class="nav-item nav-icon">
                                            <a href="#" class="search-toggle device-search">
                                                <i class="ri-search-line"></i>
                                            </a>
                                            <div class="search-box iq-search-bar d-search">
                                                <div class="form-group position-relative goSearchBox">
                                                    <input type="text" id="goSearch"class="text search-input font-size-12"
                                                        placeholder="type here to search...">
                                                    <i class="search-link ri-search-line"></i>
                                                </div>
                                                <div class="SearchView">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item nav-icon">
                                            <a href="#" class="search-toggle position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                                    height="22" class="noti-svg">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                                </svg>
                                                @if (auth('member')->check())
                                                @if(count(auth('member')->user()->unreadNotifications) == 0)
                                                <span class="bg-danger dots"></span>
                                                @else
                                                <span class="bg-danger" 
                                                    style="height: 14px;
                                                            width: 14px;
                                                            font-size: 10px;
                                                            text-align: center;
                                                            padding: 2px;
                                                            position: absolute;
                                                            top: 0px;
                                                            right: -2px;
                                                            border-radius: 50%;">
                                                    {{count(auth('member')->user()->unreadNotifications)}}
                                                </span>
                                                @endif
                                                @else 
                                                <span class="bg-danger dots"></span>
                                                @endif
                                            </a>
                                            <div class="iq-sub-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body">
                                                        @if (auth('member')->check())
                                                        @if(count(auth('member')->user()->notifications)>0)
                                                        @foreach(auth('member')->user()->notifications()->limit(7)->get() as $notification)
                                                        @if($notification->read_at)
                                                        <a href="{{route('frontend.readNotification',$notification->id)}}" class="iq-sub-card" style="background-color:#323131;">
                                                            <div class="media align-items-center">
                                                                <img src="{{ asset('assets/frontend/images/notify/cinebaz-icon.png') }}"
                                                                    class="img-fluid mr-3" alt="streamit" style="width:40px;"/>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 ">{{$notification->data['title']}}</h6>
                                                                    <small class="font-size-12"> {{$notification->created_at->diffForHumans()}} </small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        @else
                                                        <a href="{{route('frontend.readNotification',$notification->id)}}" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <img src="{{ asset('assets/frontend/images/notify/cinebaz-icon.png') }}"
                                                                    class="img-fluid mr-3" alt="streamit" style="width:40px;"/>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 ">{{$notification->data['title']}}</h6>
                                                                    <small class="font-size-12"> {{$notification->created_at->diffForHumans()}} </small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <a href="#"
                                                class="iq-user-dropdown search-toggle d-flex align-items-center">
                                                <img src="{{ asset('assets/frontend/images/user/user.jpg') }}" class="img-fluid avatar-40 rounded-circle" alt="user">
                                            </a>
                                            <div class="iq-sub-dropdown iq-user-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body p-0 pl-3 pr-3">
                                                        <a href="manage-profile.html"
                                                            class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-file-user-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Manage Profile</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Settings</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#"
                                                            class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Pricing Plan</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-logout-circle-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0">Logout</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-right menu-right">
                            <ul class="d-flex align-items-center list-inline m-0">
                                <li class="nav-item nav-icon">
                                    <a href="#" class="search-toggle device-search">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="search-box iq-search-bar d-search">
                                        <div class="form-group position-relative goSearchBox">
                                            <input type="text" id="goSearch"class="text search-input font-size-12"
                                                placeholder="type here to search...">
                                            <i class="search-link ri-search-line"></i>
                                        </div>
                                        <div class="SearchView">
                                        </div>
                                    </div>
                                </li>
                                @if (false)
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle" data-toggle="search-toggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                                height="22" class="noti-svg">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                            </svg>
                                            <span class="bg-danger dots"></span>
                                        </a>
                                        <div class="iq-sub-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('assets/frontend/images/notify/thumb-1.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">Boot Bitty</h6>
                                                                <small class="font-size-12"> just now</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('assets/frontend/images/notify/thumb-2.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Last Breath</h6>
                                                                <small class="font-size-12">15 minutes ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('assets/frontend/images/notify/thumb-3.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Hero Camp</h6>
                                                                <small class="font-size-12">1 hour ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                @if (auth('member')->check())
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                            data-toggle="search-toggle">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> main
                                            @if(isset(auth('member')->user()->images[0]->small))
                                                <img src="{{ asset(auth('member')->user()->images[0]->small)}}" class="img-fluid avatar-40 rounded-circle" alt="user" style="width:20px;height:40px;">
                                            @else
                                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid avatar-40 rounded-circle" alt="user" style="width:20px;height:40px;">    
                                            @endif
<<<<<<< HEAD
=======
                                          
=======
                                            @if(count(auth('member')->user()->images))> 0)
                                            <img src="{{ asset(auth('member')->user()->images[0]->small) }}" class="img-fluid avatar-40 rounded-circle" alt="user" style="width:20px;height:40px;">
                                            @else
                                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid avatar-40 rounded-circle" alt="user" style="width:20px;height:40px;">    
                                            @endif
>>>>>>> 519bc550150e5fe3b6de83f850a1f00e43960376
>>>>>>> main
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="{{ route('member.auth.profile') }}"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-file-user-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('member.auth.library') }}"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">My Library</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('member.auth.settings') }}"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('frontend.plan') }}"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Pricing Plan</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('member.auth.logout') }}"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-logout-circle-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Logout</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item nav-icon">
                                        <a href="{{ route('frontend.plan') }}">
                                            Pricing Plan
                                        </a>
                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="{{ route('member.auth.showlogin') }}">
                                            Login
                                        </a>
                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="{{ route('member.auth.register') }}">
                                            Register
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                                height="22" class="noti-svg">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                            </svg>
                                            @if (auth('member')->check())
                                            @if(count(auth('member')->user()->unreadNotifications) == 0)
                                            <span class="bg-danger dots"></span>
                                            @else
                                            <span class="bg-danger " style="height: 14px;width: 14px;font-size: 10px;text-align: center;padding: 2px;
                                                                                position: absolute;
                                                                                top: 0px;
                                                                                right: -2px;
                                                                                border-radius: 50%;"
                                            >
                                                {{count(auth('member')->user()->unreadNotifications)}}
                                            </span>
                                            @endif
                                            @else 
                                            <span class="bg-danger dots"></span>
                                            @endif
                                        </a>
                                        <div class="iq-sub-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body">
                                                @if (auth('member')->check())
                                                    @if(count(auth('member')->user()->notifications)>0)
                                                    @foreach(auth('member')->user()->notifications()->limit(7)->get() as $notification)
                                                    @if($notification->read_at)
                                                    <a href="{{route('frontend.readNotification',$notification->id)}}" class="iq-sub-card" style="background-color:#323131;">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('assets/frontend/images/notify/cinebaz-icon.png') }}"
                                                                class="img-fluid mr-3" alt="streamit" style="width:40px;"/>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">{{$notification->data['title']}}</h6>
                                                                <small class="font-size-12"> {{$notification->created_at->diffForHumans()}} </small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @else
                                                    <a href="{{route('frontend.readNotification',$notification->id)}}" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('assets/frontend/images/notify/cinebaz-icon.png') }}"
                                                                class="img-fluid mr-3" alt="streamit" style="width:40px;"/>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">{{$notification->data['title']}}</h6>
                                                                <small class="font-size-12"> {{$notification->created_at->diffForHumans()}} </small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="nav-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</header>
@push('scripts')
  <script>
         $(document).on('keyup', '#goSearch', function() {
          
            let search_key = $(this).val();
            $.ajax({
                url: "{{ route('frontend.ajax.search') }}",
                data: {
                    q: search_key
                },
                success: function(data) {
                    // console.log(data.data);
                    $(".SearchView").html(data.data);
                }
            });
            // $(this).closest('.drop_img').remove();
        });
         //$(document).on('keyup', '#goSearchMobile', function() {
             //alert('Sufian');
            // var name = $(this).data('name');
            // $.ajax({
            //     url: "{{ route('dropzone.delete') }}",
            //     data: {
            //         name: name
            //     },
            //     success: function(data) {
            //         $("#up_featured").show();
            //     }
            // });
            // $(this).closest('.drop_img').remove();
       // });
  </script>

@endpush