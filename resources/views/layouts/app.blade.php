<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WhatsApp Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #343a40;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #007bff;
            border-radius: 5px;
        }
        .content {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 20px;
        }
        .card-custom {
            border: 1px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Navbar (Topbar) -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WhatsApp Dashboard</a>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-md-3 p-4">
            <h3 class="text-white">Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wa.sender') }}">WhatsApp Sender</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wa.schedule') }}">Schedule Message</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wa.auto-reply') }}">Auto Reply</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wa.contacts') }}">Contact Save</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wa.receive') }}">Receive Messages</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content col-md-9 p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

    <!-- Footer Section -->
    <footer class="footer mt-2">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} SI Payung All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
