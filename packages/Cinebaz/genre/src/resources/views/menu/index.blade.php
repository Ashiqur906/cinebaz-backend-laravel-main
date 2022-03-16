<li class=" {{ Route::is('admin.genre.*') ? 'active active-menu' : '' }}">

    <a href="#genre_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.genre.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Genre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="genre_menu" class="iq-submenu collapse  {{ Route::is('admin.genre.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.genre.all') ? 'active' : '' }}"><a href="{{ route('admin.genre.all') }}"><i
                    class="lar la-circle"></i> Genres</a></li>
        <li class="{{ Route::is('admin.genre.add') ? 'active' : '' }}"><a href="{{ route('admin.genre.add') }}"><i
                    class="lar la-circle"></i> Add new</a></li>
    </ul>
</li>
