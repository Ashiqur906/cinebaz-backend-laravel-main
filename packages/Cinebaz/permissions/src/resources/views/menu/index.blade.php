<li class=" {{ Route::is('admin.permission.*') ? 'active active-menu' : '' }}">

    <a href="#permissions_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.permission.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Permissions</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="permissions_menu" class="iq-submenu collapse  {{ Route::is('admin.permission.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.permission.roles') ? 'active' : '' }}"><a href="{{ route('admin.permission.roles') }}"><i
                    class="lar la-circle"></i> Roles </a></li>
        <li class="{{ Route::is('admin.permission.permissions') ? 'active' : '' }}"><a href="{{ route('admin.permission.permissions') }}"><i
                    class="lar la-circle"></i> Permissions</a></li>
        <li class="{{ Route::is('admin.permission.assign') ? 'active' : '' }}"><a href="{{ route('admin.permission.assign') }}"><i
                    class="lar la-circle"></i> Assign </a></li>
    </ul>
</li>
