<li class=" {{ Route::is('admin.artist.*') ? 'active active-menu' : '' }}">
    <a href="#artist_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.artist.*') ? 'true' : 'false' }}">
        <i class="fa fa-users"></i><span>Artist</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="artist_menu" class="iq-submenu collapse  {{ Route::is('admin.artist.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.artist.index') ? 'active' : '' }}">
            <a href="{{ route('admin.artist.index') }}"><i class="lar la-circle"></i>Artists</a>
        </li>
        <li class="{{ Route::is('admin.artist.create') ? 'active' : '' }}">
            <a href="{{ route('admin.artist.create') }}"><i class="lar la-circle"></i> Add new</a>
        </li>
    </li>
    </ul>
</li>
