{{-- <li class=" {{ Route::is('admin.category.*') ? 'active active-menu' : '' }}">
    <a href="{{ route('admin.category.index') }}" class="iq-waves-effect">
        <i class="las la-list"></i><span>Category</span>
    </a>
</li> --}}


<li class=" {{ Route::is('admin.category.*') ? 'active active-menu' : '' }}">
    <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Category</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
    <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
       <li><a href="{{ route('admin.category.add') }}"><i class="las la-user-plus"></i>Add Category</a></li>
       <li><a href="{{ route('admin.category.index') }}"><i class="las la-eye"></i>Category List</a></li>
    </ul>
 </li>