<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Foto Profil di Header */
        .profile {
            position: absolute;
            top: 90px; /* Jarak dari atas */
            right: 20px; /* Jarak dari kanan */
        }

        .profile-picture {
            width: 40px; /* Ukuran gambar diperbaiki */
            height: 40px; /* Ukuran gambar diperbaiki */
            border-radius: 50%; /* Membulatkan gambar */
            object-fit: cover; /* Memastikan gambar menyesuaikan bentuk */
            border: 2px solid #e3e3e3; /* Border tipis */
        }

        /* Dropdown Menu */
        .dropdown-menu {
            min-width: 100px; /* Ukuran dropdown */
        }

        .dropdown-menu .avatar img {
            width: 40px; /* Ukuran gambar di dalam dropdown */
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>User Profile</h1>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="https://i.pinimg.com/736x/5e/e1/62/5ee16212213bb8abfd4f6a8f0c71faf6.jpg" alt="Profile Picture" class="profile-picture">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="https://i.pinimg.com/736x/5e/e1/62/5ee16212213bb8abfd4f6a8f0c71faf6.jpg" alt="Profile Picture" class="profile-picture">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">Mba IU</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-cog me-2"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="auth-login-basic.html">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
