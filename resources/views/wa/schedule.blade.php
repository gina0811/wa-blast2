@extends('layouts.app')

@section('title', 'Schedule Message')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Schedule Message</h4>
            </div>
        </div>

        <div class="card-body">
            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Pesan Terjadwal -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Send At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scheduledMessages as $message)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->phone_number }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ \Carbon\Carbon::parse($message->send_at)->format('d M Y H:i') }}</td>
                                <td>{{ $message->sent ? 'Sent' : 'Pending' }}</td>
                                <td>
                                    <!-- Button Edit/Delete -->
                                    <a href="{{ route('wa.schedule.edit', $message->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('wa.schedule.destroy', $message->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            <!-- Form Penjadwalan Pesan -->
            <h5>Add New Scheduled Message</h5>
            <form action="{{ route('wa.schedule') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required placeholder="Enter phone number">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Enter message"></textarea>
                </div>
                <div class="mb-3">
                    <label for="send_at" class="form-label">Send At</label>
                    <input type="datetime-local" class="form-control" id="send_at" name="send_at" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Schedule Message</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<!-- Add your custom styles here -->
<style>
    .card-custom {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #3498db;
        color: white;
        font-weight: bold;
        padding: 15px 20px;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 30px;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .btn-sm {
        font-size: 12px;
        padding: 5px 10px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table {
        margin-bottom: 0;
        background-color: #fff;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #ddd;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        padding: 10px;
        font-weight: bold;
    }
</style>
