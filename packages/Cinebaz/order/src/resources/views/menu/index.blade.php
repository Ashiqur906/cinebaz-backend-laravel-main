<li class=" {{ Route::is('admin.order.*') ? 'active active-menu' : '' }}">

    <a href="#order_menu" class="iq-waves-effect collapsed" data-toggle="collapse"
        aria-expanded="{{ Route::is('admin.order.*') ? 'true' : 'false' }}">
        <i class="lar la-file-alt"></i><span>Order</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>
    <ul id="order_menu" class="iq-submenu collapse  {{ Route::is('admin.order.*') ? 'show' : '' }}"
        data-parent="#iq-sidebar-toggle">
        <li class="{{ Route::is('admin.order.index') ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}"><i
                    class="lar la-circle"></i> Orders</a></li>
    </ul>
</li>
