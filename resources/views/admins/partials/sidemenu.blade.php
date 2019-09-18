  <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->profilImage() }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->fullName() }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->segment(3) ==  'setting' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> 
                    <span>{{ __('custom.settings') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('settings.index') }}"><i class="fa fa-gears "></i> {{ __('custom.settings') }}</a></li>
                    <li><a href="{{ route('settings.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(3) ==  'admins' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-users"></i> 
                    <span>{{ __('custom.admins') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admins') }}"><i class="fa fa-users "></i> {{ __('custom.admins') }}</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_admin') }}</a></li>
                </ul>
            </li>

            <li class="{{ request()->segment(3) ==  'users' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{ __('custom.users') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users "></i> {{ __('custom.users') }}</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_user') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(3) ==  'categories' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>{{ __('custom.categories') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-tasks "></i> {{ __('custom.categories') }}</a></li>
                    <li><a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_category') }}</a></li>
                </ul>
            </li>

            <li class="{{ request()->segment(3) ==  'cities' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-flag-o"></i> <span>{{ __('custom.cities') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('cities.index') }}"><i class="fa fa-flag-o "></i> {{ __('custom.cities') }}</a></li>
                    <li><a href="{{ route('cities.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_city') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(3) ==  'states' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-flag-o"></i> <span>{{ __('custom.states') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('states.index') }}"><i class="fa fa-flag-o "></i> {{ __('custom.states') }}</a></li>
                    <li><a href="{{ route('states.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_state') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(3) ==  'properties' && request()->segment(4) == 'pending'  && request()->segment(4) == 'refused'? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i> 
                    <span>{{ __('custom.properties') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('properties.index') }}"><i class="fa fa-building-o "></i> {{ __('custom.properties') }}</a></li>
                    <li><a href="{{ route('properties.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add_property') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(4) ==  'pending' ? 'active' : ''}}">
                <a href="{{ route('properties.pending') }}">
                    <i class="fa fa-building-o"></i> <span>{{ __('custom.pending_properties') }}</span>
                    
                </a>
            </li>
            <li class="{{ request()->segment(4) ==  'refused' ? 'active' : ''}}">
                <a href="{{ route('properties.refused') }}">
                    <i class="fa fa-building-o"></i> <span>{{ __('custom.refused_properties') }}</span>
                    
                </a>
            </li>
            <li class="{{ request()->segment(3) ==  'property-types' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span>{{ __('custom.property_types') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('property-types.index') }}"><i class="fa fa-building-o "></i> {{ __('custom.property_types') }}</a></li>
                    <li><a href="{{ route('property-types.create') }}"><i class="fa fa-plus"></i> {{ __('custom.property_type_create') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(3) ==  'aboutus' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>{{ __('custom.aboutus') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('aboutus.index') }}"><i class="fa fa-book "></i> {{ __('custom.aboutus') }}</a></li>
                    <li><a href="{{ route('aboutus.create') }}"><i class="fa fa-plus"></i> {{ __('custom.add') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>