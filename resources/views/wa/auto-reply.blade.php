@extends('layouts.app')

@section('title', 'Auto Reply')

@section('content')
<div class="page-header">
    <h1>Auto Reply</h1>
    <p>Atur pesan balasan otomatis untuk WhatsApp.</p>
</div>

<div class="form-section">
    <form action="{{ route('wa.auto-reply') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="keyword">Kata Kunci:</label>
            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Contoh: Hai, Hello">
        </div>

        <div class="form-group">
            <label for="response">Balasan:</label>
            <textarea name="response" id="response" rows="6" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Balasan</button>
        </div>
    </form>
</div>
@endsection
