<li class=" {{ Route::is('admin.videoquality.*') ? 'active active-menu' : '' }}">

    <a href="#pricing_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.videoquality.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Pricing & Plan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="pricing_menu" class="iq-submenu collapse  {{ Route::is('admin.subscription.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">

        <li class="{{ Route::is('admin.videoquality.videoQuality') ? 'active' : '' }}">
            <a href="{{ route('admin.videoquality.videoQuality') }}">
                <i class="lar la-circle"></i> Video Quality
            </a>
        </li>

        <li class="{{ Route::is('admin.subscription.head') ? 'active' : '' }}">
            <a href="{{ route('admin.subscription.head') }}">
                <i class="lar la-circle"></i> Subscription Head
            </a>
        </li>
        <li class="{{ Route::is('admin.subscription.plan') ? 'active' : '' }}">
            <a href="{{ route('admin.subscription.plan') }}">
                <i class="lar la-circle"></i> Plan Head 
            </a>
        </li>
        <li class="{{ Route::is('admin.subscription.assign') ? 'active' : '' }}">
            <a href="{{ route('admin.subscription.assign') }}">
                <i class="lar la-circle"></i> Assign 
            </a>
        </li>
        {{-- <li class="{{ Route::is('admin.videoquality.add') ? 'active' : '' }}"><a href="{{ route('admin.videoquality.add') }}"><i
                    class="lar la-circle"></i> Add Quality</a></li>
        <li class="{{ Route::is('admin.pricing.add') ? 'active' : '' }}"><a href="{{ route('admin.pricing.add') }}"><i
                    class="lar la-circle"></i> Add Price</a></li> --}}
    </ul>
</li>
