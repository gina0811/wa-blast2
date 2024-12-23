@extends('layouts.app')

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

        <div id="whatsapp-status">
            @if (isset($whatsapp['data']))
                @if ($whatsapp['data'] == 'You are already logged in')
                    <p class="text-success">Anda sudah login ke WhatsApp.</p>
                    <form action="{{ route('wa.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="this.disabled=true;this.form.submit();">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Logout
                        </button>
                    </form>
                @else
                    <h5>Silakan Scan QR Code untuk Login:</h5>
                    <img src="data:image/png;base64,{{ $whatsapp['data'] }}" alt="QR Code"
                        class="img-fluid mx-auto d-block" style="max-width: 300px;">
                @endif
            @else
                <p class="text-danger">Terjadi kesalahan saat memuat status WhatsApp.</p>
            @endif
        </div>

    </div>

    <script>
        let statusPolling;

        const checkWhatsappStatus = () => {
            fetch("{{ route('wa.status') }}")
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'You are already logged in') {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error checking WhatsApp status:', error);
                    clearInterval(statusPolling);
                });
        };

        // Start polling
        statusPolling = setInterval(checkWhatsappStatus, 5000);

        // Clear polling on logout
        document.querySelector('form[action="{{ route('wa.logout') }}"]')
            .addEventListener('submit', () => {
                clearInterval(statusPolling);
            });
    </script>
@endsection
