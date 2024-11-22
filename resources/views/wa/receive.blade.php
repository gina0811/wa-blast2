@extends('layouts.app')

@section('title', 'Receive Message')

@section('content')
<div class="page-header">
    <h1>Receive Message</h1>
    <p>Pesan yang diterima akan ditampilkan di sini.</p>
</div>

<div class="message-list">
    <ul>
        <!-- Contoh pesan -->
        <li>
            <strong>Nomor: 628123456789</strong>
            <p>Halo, ini adalah contoh pesan masuk.</p>
        </li>
    </ul>
</div>
@endsection
