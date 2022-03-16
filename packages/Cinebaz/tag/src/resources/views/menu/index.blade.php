<li class=" {{ Route::is('admin.tag.*') ? 'active active-menu' : '' }}">

    <a href="#tag_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.tag.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Tag</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="tag_menu" class="iq-submenu collapse  {{ Route::is('admin.tag.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.tag.index') ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}"><i
                    class="lar la-circle"></i> Tags</a></li>
        <li class="{{ Route::is('admin.tag.add') ? 'active' : '' }}"><a href="{{ route('admin.tag.add') }}"><i
                    class="lar la-circle"></i> Add new</a></li>
    </ul>
</li>
