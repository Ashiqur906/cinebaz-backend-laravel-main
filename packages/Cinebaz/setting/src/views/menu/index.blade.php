
<li class=" {{ Route::is('admin.setting.*') ? 'active active-menu' : '' }}">

    <a href="#configuration_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.setting.*') ? 'true' : 'false' }}">
        <i class="las la-tools"></i><span>Configuration</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="configuration_menu" class="iq-submenu collapse  {{ Route::is('admin.setting.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.setting.index') ? 'active' : '' }}"><a
                href="{{ route('admin.setting.index') }}"><i class="lar la-circle"></i> Setting</a></li>
        <li class="{{ Route::is('admin.setting.menu') ? 'active' : '' }}"><a
                href="{{ route('admin.setting.menu') }}"><i class="lar la-circle"></i> Menu Builder</a></li>
    </ul>
</li>
