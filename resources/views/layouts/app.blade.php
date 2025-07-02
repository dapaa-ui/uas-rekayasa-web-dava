<!DOCTYPE html>
<html>
<head>
    <title>Admin E-Commerce</title>
    <link rel="stylesheet" href="{{ secure_asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/datatable.bootstrap5.min.css') }}">
    @stack('styles')
    <style>
        body {
            min-height: 100vh;
            background-color:rgb(255, 255, 255);
        }
        .sidebar {
            min-height: 100vh;
            background:rgb(142, 109, 0);
            color: #fff;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background:rgb(138, 149, 95);
            color: #fff;
        }
        .header {
            background: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 2rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <div class="position-sticky">
                <div class="mb-4 text-center">
                    <img src="{{ secure_asset('assets/image/logodapuy1.png') }}" style="max-width: 120px; height:auto;" alt="">
                </div>
                    <h4 class="text-center mb-4">E-Commerce</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' :  ''}}" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pesanan') ? 'active' :  ''}}" href="{{ route('pesanan.index') }}">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <!-- Header -->
                <div class="header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Dashboard</h2>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Content -->
                <div class="py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ secure_asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/datatable.bootstrap5.js') }}"></script>
    @stack('scripts')
</body>
</html>
