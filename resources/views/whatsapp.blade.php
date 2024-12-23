@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container text-center mt-5">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (isset($whatsapp['data']))
        @if ($whatsapp['data'] == 'You are already logged in')
            <p class="text-success">Anda Sudah Login...</p>
            <form action="{{ route('whatsapp.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <h5>Silakan Scan QR Code untuk Login:</h5>
            <img src="data:image/png;base64,{{ $whatsapp['data'] }}" alt="QR Code" class="img-fluid mx-auto d-block" style="max-width: 300px;">
        @endif
    @else
        <p class="text-danger">Terjadi kesalahan saat memuat status WhatsApp.</p>
    @endif

</div>
@endsection
