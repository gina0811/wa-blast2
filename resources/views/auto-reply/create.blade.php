@extends('layouts.app')

@section('title', 'Tambah Auto Reply')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4">Tambah Auto Reply</h4>

    <form action="{{ route('wa.auto-reply.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="keyword" class="form-label">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" required>
        </div>

        <div class="mb-3">
            <label for="response" class="form-label">Response</label>
            <textarea class="form-control" id="response" name="response" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('wa.auto-reply.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
