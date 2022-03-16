<li class=" {{ Route::is('admin.media.*') ? 'active active-menu' : '' }}">

    <a href="#media_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.media.*') ? 'true' : 'false' }}">
        <i class="las la-video"></i><span>Media</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="media_menu" class="iq-submenu collapse  {{ Route::is('admin.media.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.media.index') ? 'active' : '' }}">
            <a href="{{ route('admin.media.index') }}"><i class="lar la-circle"></i> Medias</a>
        </li>
        <li class="{{ Route::is('admin.media.tranding') ? 'active' : '' }}">
            <a href="{{ route('admin.media.tranding') }}"><i class="lar la-circle"></i> Tranding </a>
        </li>
        <li class="{{ Route::is('admin.media.top') ? 'active' : '' }}">
            <a href="{{ route('admin.media.top') }}"><i class="lar la-circle"></i> TopTen  </a>
        </li>
    </ul>
</li>


