<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="{{asset('/assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::guard('admin')->user()->name)
                        {{ Auth::guard('admin')->user()->name }}
                    @endif
                        <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                        <i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Settings</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                        href="{{ route('admin.categories.index') }}">
                        <i class="app-menu__icon fa fa-tags"></i>
                        <span class="app-menu__label">Categories</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                        <i class="app-menu__icon fa fa-th"></i>
                        <span class="app-menu__label">Attributes</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
                        <i class="app-menu__icon fa fa-briefcase"></i>
                        <span class="app-menu__label">Brands</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.cluster.index' ? 'active' : '' }}" href="{{ route('admin.clusters.index') }}">
                        <i class="app-menu__icon fas fa-warehouse"></i>
                        <span class="app-menu__label">Clusters</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.rooms.index' ? 'active' : '' }}" href="{{ route('admin.rooms.index') }}">
                        <i class="app-menu__icon fa fa-building"></i>
                        <span class="app-menu__label">Rooms</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.seats.index' ? 'active' : '' }}" href="{{ route('admin.seats.index') }}">
                        <i class="fas fa-couch"></i>
                        <span class="app-menu__label">Seats</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.films.index' ? 'active' : '' }}" href="{{ route('admin.films.index') }}">
                        <i class="fas fa-film"></i>
                        <span class="app-menu__label">Film</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.schedules.index' ? 'active' : '' }}" href="{{ route('admin.schedules.index') }}">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="app-menu__label">Schedules</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}"
                        href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-box-open"></i>
                        <span class="app-menu__label">Orders</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>