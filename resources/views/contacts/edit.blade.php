@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4 text-primary">Edit Kontak</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact->phone }}" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Pasien</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="prolanis kelompok ht 1" {{ $contact->type === 'prolanis kelompok ht 1' ? 'selected' : '' }}>Prolanis Kelompok HT 1</option>
                        <option value="prolanis kelompok ht 2" {{ $contact->type === 'prolanis kelompok ht 2' ? 'selected' : '' }}>Prolanis Kelompok HT 2</option>
                        <option value="prolanis kelompok dm" {{ $contact->type === 'prolanis kelompok dm' ? 'selected' : '' }}>Prolanis Kelompok DM</option>
                        <option value="tb paru" {{ $contact->type === 'tb paru' ? 'selected' : '' }}>TB Paru</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
