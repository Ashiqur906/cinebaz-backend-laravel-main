<li class=" {{ Route::is('admin.seo.*') ? 'active active-menu' : '' }}">

    <a href="#seo_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.seo.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Seo</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="seo_menu" class="iq-submenu collapse  {{ Route::is('admin.seo.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.seo.all') ? 'active' : '' }}"><a href="{{ route('admin.seo.all') }}"><i
                    class="lar la-circle"></i> Seos</a></li>
        <li class="{{ Route::is('admin.seo.add') ? 'active' : '' }}"><a href="{{ route('admin.seo.add') }}"><i
                    class="lar la-circle"></i> Add new</a></li>
    </ul>
</li>
