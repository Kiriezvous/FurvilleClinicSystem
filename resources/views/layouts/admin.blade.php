<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

@include('includes.navbar')

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Furville</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt red"></i>
                            <p>
                                Dashboard
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                                <span class="right badge badge-danger">New</span>
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
                                <a href="/users/register" class="nav-link">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p>View Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <i class="fas fa-clock"></i>
                                    <p>Add Schedule</p>
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
                                <a href="/inventory/categories" class="nav-link">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/inventory/products" class="nav-link">
                                    <i class="fas fa-boxes"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/service" class="nav-link">
                            <i class="nav-icon fas fa-cut"></i>
                            <p>
                                Service
                                <span class="right badge badge-danger">New</span>
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
                                <a href="/animal/types" class="nav-link">
                                    <i class="fas fa-filter"></i>
                                    <p>Types</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/animal/characteristics" class="nav-link">
                                    <i class="fas fa-font"></i>
                                    <p>Characteristics</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/animal/dog" class="nav-link">
                                    <i class="fas fa-dog"></i>
                                    <p>Dog Breed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/animal/cat" class="nav-link">
                                    <i class="fas fa-cat"></i>
                                    <p>Cat Breed</p>
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
                                <a href="/users" class="nav-link">
                                    <i class="fas fa-user-md"></i>
                                    <p>Doctors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <i class="fas fa-user-nurse"></i>
                                    <p>Staff</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/status" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Status
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/reports" class="nav-link">
                            <i class="nav-icon fas fa-toggle-on orange"></i>
                            <p>
                                Reports
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

    <div class="content-wrapper">
        <router-view>

        </router-view>
    @yield('content')
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
