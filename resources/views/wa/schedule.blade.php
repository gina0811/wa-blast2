@extends('layouts.app')

@section('title', 'Schedule Message')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3>Schedule Message</h3>
        </div>
        <div class="card-body">
            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('wa.schedule') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="send_at" class="form-label">Send At</label>
                    <input type="datetime-local" class="form-control" id="send_at" name="send_at" required>
                </div>
                <button type="submit" class="btn btn-primary">Schedule Message</button>
            </form>
        </div>
    </div>
@endsection
