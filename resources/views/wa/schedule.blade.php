@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pesan Terjadwal</h1>

    @if ($scheduledMessages->isEmpty())
        <p>Tidak ada pesan terjadwal.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Jadwal</th>
                    <th>Nomor</th>
                    <th>Pesan</th>
                    <th>Waktu Mulai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scheduledMessages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->schedule_type }}</td>
                        <td>{{ $message->number }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->start_in }}</td>
                        <td>
                            <a href="{{ route('schedule-message.edit', $message->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('schedule-message.destroy', $message->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
