<li class=" {{ Route::is('admin.register.*') ? 'active active-menu' : '' }}">

    <a href="#register_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.register.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="register_menu" class="iq-submenu collapse  {{ Route::is('admin.register.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.register') ? 'active' : '' }}"><a href="{{ route('admin.register') }}"><i
                    class="lar la-circle"></i> List</a></li>
        <li class="{{ Route::is('admin.register') ? 'active' : '' }}"><a href="{{ route('admin.trash') }}"><i
                    class="lar la-circle"></i> trash List</a></li>
    </ul>
</li>
