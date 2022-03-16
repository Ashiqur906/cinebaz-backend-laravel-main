<li class=" {{ Route::is('admin.season.*') ? 'active active-menu' : '' }}">

    <a href="#season_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.season.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Season</span><i
            class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="season_menu" class="iq-submenu collapse  {{ Route::is('admin.season.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.season.index') ? 'active' : '' }}"><a
                href="{{ route('admin.season.index') }}"><i class="lar la-circle"></i> Seasons</a></li>
        <li class="{{ Route::is('admin.season.add') ? 'active' : '' }}"><a href="{{ route('admin.season.add') }}"><i
                    class="lar la-circle"></i> Add new</a></li>
    </ul>
</li>
