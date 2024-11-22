@extends('layouts.app')

@section('title', 'Contact Save')

@section('content')
<div class="page-header">
    <h1>Contact Save</h1>
    <p>Gunakan halaman ini untuk menambah kontak baru.</p>
</div>

<div class="form-section">
    <form action="{{ route('wa.contacts') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kontak">
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Contoh: 628123456789">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Kontak</button>
        </div>
    </form>
</div>
@endsection
