@extends('layouts.app')

@section('title', 'Auto Reply Management')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4">Auto Reply Management</h4>

    <!-- Flash message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Action -->
    <div class="mb-3">
        <a href="{{ route('wa.auto-reply.create') }}" class="btn btn-success">Tambah Auto Reply</a>
        <a href="#" class="btn btn-info">Import Data</a>
        <a href="#" class="btn btn-danger">Export Data</a>
    </div>

    <!-- Tabel Auto Reply -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Keyword</th>
                        <th>Response</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($autoReplies as $reply)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reply->keyword }}</td>
                            <td>{{ $reply->response }}</td>
                            <td>
                                <a href="{{ route('wa.auto-reply.edit', $reply->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('wa.auto-reply.destroy', $reply->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data Auto Reply.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
