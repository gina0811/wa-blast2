@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="header bg-light py-3 px-4 d-flex justify-content-between align-items-center">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
        </div>
    </div>
    <!-- /Search -->
    
    <!-- Profile Section -->
    <div class="profile">
        <img src="https://i.pinimg.com/736x/5e/e1/62/5ee16212213bb8abfd4f6a8f0c71faf6.jpg" alt="Profile Picture" class="profile-picture">
        <style>
            /* Foto Profil di Header */
            .profile {
                position: absolute;
                top: 90px; /* Jarak dari atas */
                right: 20px; /* Jarak dari kanan */
            }

            .profile-picture {
                width: 50px; /* Ukuran gambar */
                height: 50px;
                border-radius: 50%; /* Membulatkan gambar */
                object-fit: cover; /* Memastikan gambar menyesuaikan bentuk */
                border: 2px solid #e3e3e3; /* Border tipis */
            }
        </style>
    </div>
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
    /* Card Styling */
    .card-custom {
        box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk estetika */
        border-radius: 8px; /* Membulatkan sudut */
        border: none; /* Hilangkan border bawaan */
        padding: 0px 0px; /* Kurangi padding agar teks tidak terlalu jauh dari tepi */
        margin-bottom: 20px; /* Jarak antar card */
        height: auto; /* Tinggi dinamis sesuai konten */
        text-align: justify; /* Rata tengah isi card */
    }

    .card-title {
        font-size: 14px; /* Ukuran font judul */
        font-weight: 600; /* Tebalkan teks judul */
        margin-bottom: 6px; /* Jarak kecil antara judul dan isi teks */
    }

    .card-text {
        font-size: 13px; /* Ukuran font teks isi */
        color: #6c757d; /* Warna teks abu-abu */
        margin: 0; /* Hilangkan margin tambahan */
    }

    /* Adjusting Spacing Between Cards */
    .col-md-4 {
        padding: 10px; /* Tambahkan padding antar kolom */
    }

    /* Gambar pada Client is Ready */
    .custom-image {
        max-width: 140px; /* Lebar maksimal gambar */
        height: auto; /* Proporsi gambar tetap */
        margin-left: auto; /* Letakkan gambar di sisi kanan */
    }

    /* Card Client is Ready */
    .card {
        box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk estetika */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px; /* Kurangi padding agar lebih seragam */
        border: 1px solid #e3e3e3;
        border-radius: 8px;
    }
</style>

@endsection
