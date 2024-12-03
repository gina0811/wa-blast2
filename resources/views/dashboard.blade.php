@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="header bg-light py-3 px-4 d-flex justify-content-between align-items-center">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input
            type="text"
            class="form-control border-0 shadow-none"
            placeholder="Search..."
            aria-label="Search..."
        />
        </div>
    </div>
    <!-- /Search -->
    
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="https://i.pinimg.com/736x/3f/09/0a/3f090aba433ce25c8cbf0e7f7ab8feb8.jpg" alt="Profile Picture" class="profile-picture" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="https://i.pinimg.com/736x/3f/09/0a/3f090aba433ce25c8cbf0e7f7ab8feb8.jpg" alt="Profile Picture" class="profile-picture">
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">Mab IU</span>
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

<div class="container mt-4">
    <!-- Stats Cards -->
    <div class="row">
        @php
            $stats = [
                ['title' => 'Messages Sent', 'value' => '123 Messages'],
                ['title' => 'Scheduled Messages', 'value' => '4 Messages'],
                ['title' => 'Contacts Saved', 'value' => '50 Contacts'],
                ['title' => 'Auto Replies', 'value' => '3 Replies']
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-md-3">
            <div class="card card-custom">
                <div class="card-body">
                    <h6 class="card-title">{{ $stat['title'] }}</h6>
                    <p class="card-text">{{ $stat['value'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Client is Ready Card -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card d-flex align-items-center flex-row p-3">
                <div class="me-3">
                    <h6 class="card-title text-primary">Client is Ready</h6>
                    <p class="card-text mb-2">Hello Gina WhatsApp is connected to....</p>
                    <button class="btn btn-warning">Disconnect</button>
                </div>
                <div class="ms-auto">
                    <img src="https://remun.sanparama.id/storage/remuns/man-with-laptop-light.png" alt="Illustration" class="custom-image">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    /* Foto Profil */
    .profile-picture {
        width: 40px; /* Lebar gambar profil */
        height: 40px; /* Tinggi gambar profil */
        border-radius: 50%; /* Membulatkan gambar */
        object-fit: cover; /* Memastikan gambar menyesuaikan bentuk */
        border: 2px solid #e3e3e3; /* Border tipis */
    }

    /* Card Styling */
    .card-custom {
        box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        border: none;
        padding: 15px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 14px;
        font-weight: 500;
        color : green;
        font-weight: bold;
    }

    .card-text {
        font-size: 12px;
        color: #6c757d;
    }

    /* Gambar pada Client is Ready */
    .custom-image {
        max-width: 120px; /* Lebar maksimal gambar */
        height: auto; /* Proporsi gambar tetap */
    }
</style>

@endsection
