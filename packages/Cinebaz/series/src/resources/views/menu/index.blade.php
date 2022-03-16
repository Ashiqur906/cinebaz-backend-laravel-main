<li class=" {{ Route::is('admin.series.*') ? 'active active-menu' : '' }}">

    <a href="#series_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.series.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Series</span><i
            class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="series_menu" class="iq-submenu collapse  {{ Route::is('admin.series.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.series.index') ? 'active' : '' }}"><a
                href="{{ route('admin.series.index') }}"><i class="lar la-circle"></i> Seriess</a></li>
        <li class="{{ Route::is('admin.series.add') ? 'active' : '' }}"><a href="{{ route('admin.series.add') }}"><i
                    class="lar la-circle"></i> Add new</a></li>
    </ul>
</li>
