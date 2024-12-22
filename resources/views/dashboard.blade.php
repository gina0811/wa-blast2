@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Header -->
<div class="header bg-light py-3 px-4 d-flex justify-content-between align-items-center shadow-sm rounded">
    <!-- Search -->
    <div class="search-bar w-50 d-flex align-items-center bg-white shadow-sm px-3 rounded">
        <i class="bx bx-search position-absolute search-icon text-muted me-2"></i>
        <input
            type="text"
            class="form-control border-0 shadow-none"
            placeholder="Search..."
            aria-label="Search"
            style="background-color: transparent; font-size: 14px; color: #495057;"
        />
    </div>
    <!-- /Search -->

    <!-- User Profile -->
    <div class="dropdown">
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/img/avatars/c.jpg" alt="Profile Picture" class="profile-picture" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
            <li>
                <div class="dropdown-item-text d-flex align-items-center">
                    <img src="../assets/img/avatars/c.jpg" alt="Profile Picture" class="profile-picture me-2" />
                    <span class="fw-semibold">D.O</span>
                </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i> My Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bx bx-cog me-2"></i> Settings
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                    <i class="bx bx-power-off me-2"></i> Log Out
                </a>
            </li>
        </ul>
    </div>
    <!-- /User Profile -->
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-item-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <h6 class="card-title">{{ $stat['title'] }}</h6>
                        <p class="card-text">{{ $stat['value'] }}</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Client is Ready Card -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card d-flex align-items-center flex-row p-3 shadow h-100">
                <div class="me-3">
                    <h6 class="card-title text-primary">Client is Ready</h6>
                    <p class="card-text mb-2">Hello Gina WhatsApp is connected to....</p>
                    <button class="btn btn-warning">Disconnect</button>
                </div>
                <div class="ms-auto">
                    <img src="../assets/img/illustrations/1.png" alt="Illustration" class="custom-image">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    /* Header Styling */
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Search Bar Styling */
    .search-bar {
        display: flex;
        align-items: center;
        height: 40px;
        border-radius: 8px;
        background-color: #fff;
        border: 1px solid #e3e6f0;
    }

    .search-bar input {
        flex: 1;
        font-size: 14px;
        color: #495057;
    }

    .search-bar i {
        font-size: 18px;
        color: #6c757d;
    }

    /* Profile Picture Styling */
    .profile-picture {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e3e3e3;
    }

    /* Dropdown Styling */
    .dropdown-menu {
        border-radius: 10px;
        padding: 10px;
    }

    .dropdown-item {
        font-size: 14px;
        color: #333;
    }

    .dropdown-item i {
        font-size: 18px;
        margin-right: 8px;
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
        font-size: 13px;
        font-weight: 500;
        color : #2980b9;
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
