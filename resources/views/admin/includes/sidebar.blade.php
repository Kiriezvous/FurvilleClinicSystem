<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><h5>Furville</h5></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/images/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                            <span class="right badge badge-warning">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Appointment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('schedule.index')}}" class="nav-link">
                                <i class="fas fa-calendar-alt"></i>
                                <p>View Schedule</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schedule.create')}}" class="nav-link">
                                <i class="fas fa-clock"></i>
                                <p>Walk in Appointment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Inventory
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">
                                <i class="fas fa-boxes"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-luggage-cart"></i>
                        <p>
                            Customers Order
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('services.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cut"></i>
                        <p>
                            Service
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>
                            Animal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('types.index') }}" class="nav-link">
                                <i class="fas fa-filter"></i>
                                <p>Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('breeds.index')}}" class="nav-link">
                                <i class="fas fa-dog"></i>
                                <p>Breed</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Patients
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('records.index')}}" class="nav-link">
                                <i class="fas fa-record-vinyl"></i>
                                <p>Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('patients.index')}}" class="nav-link">
                                <i class="fas fa-user-injured"></i>
                                <p>Patients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('diagnosis.index')}}" class="nav-link">
                                <i class="fas fa-diagnoses"></i>
                                <p>Diagnosis</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('doctors.index')}}" class="nav-link">
                                <i class="fas fa-user-md"></i>
                                <p>Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees.index')}}" class="nav-link">
                                <i class="fas fa-user-nurse"></i>
                                <p>Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('clients.index')}}" class="nav-link">
                                <i class="fas fa-user"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">
                        <i class="nav-icon fas fa-power-off"></i>

                        <P>{{ __('Logout') }}</P>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
