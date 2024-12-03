<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title', 'WhatsApp Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f5;
        }

        .sidebar {
            background-color: #ffffff; /* Warna utama sidebar */
            height: 100vh;
            padding: 20px 15px;
        }

        .sidebar h3 {
            font-size: 18px;
            font-weight: bold;
            color: #ecf0f1;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #bdc3c7; /* Warna teks */
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #3498db; /* Warna hover/aktif */
            color: #ffffff;
        }

        .navbar {
            background-color: #2980b9; /* Warna navbar */
        }

        .navbar-brand {
            color: #ffffff !important;
            font-size: 18px;
            font-weight: bold;
        }

        .content {
            background-color: #ffffff;
            min-height: 100vh;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        footer.footer {
            background-color: #2980b9; /* Warna footer */
            color: #ffffff;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Navbar (Topbar) -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">SISNAF SI PAYUNG</a>
                </div>
            </nav>

            <div class="d-flex">
                <!-- Sidebar -->
                <div class="sidebar col-md-3">
                    <h3>Menu</h3>
                    <ul class="nav flex-column">
                        <li><a class="nav-link @if(request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a class="nav-link @if(request()->routeIs('wa.sender')) active @endif" href="{{ route('wa.sender') }}">WhatsApp Sender</a></li>
                        <li><a class="nav-link @if(request()->routeIs('wa.schedule')) active @endif" href="{{ route('wa.schedule') }}">Schedule Message</a></li>
                        <li><a class="nav-link @if(request()->routeIs('wa.auto-reply')) active @endif" href="{{ route('wa.auto-reply') }}">Auto Reply</a></li>
                        <li><a class="nav-link @if(request()->routeIs('wa.contacts')) active @endif" href="{{ route('wa.contacts') }}">Contact Save</a></li>
                        <li><a class="nav-link @if(request()->routeIs('wa.receive')) active @endif" href="{{ route('wa.receive') }}">Receive Messages</a></li>
                        <li><a class="nav-link @if(request()->routeIs('settings')) active @endif" href="{{ route('settings') }}">Settings</a></li>
                        <li><a class="nav-link @if(request()->routeIs('profile')) active @endif" href="{{ route('profile') }}">Profile</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="content col-md-9">
                    @yield('content')
                </div>
            </div>

            <!-- Footer Section -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    Made With ❤️ by
                    <a>SI PAYUNG</a>
                  </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
