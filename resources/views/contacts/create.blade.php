@extends('layouts.app')

@section('content')
<div class="container">
    <h4 style="font-family: Arial, sans-serif; font-size: 24px; font-weight: bold; color: #007bff; text-align: center;" class="py-3 mb-4">Tambah Kontak Baru</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label" style="font-size: 14px; font-weight: bold;">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label" style="font-size: 14px; font-weight: bold;">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label" style="font-size: 14px; font-weight: bold;">Jenis Pasien</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="prolanis kelompok ht 1">Prolanis Kelompok HT 1</option>
                        <option value="prolanis kelompok ht 2">Prolanis Kelompok HT 2</option>
                        <option value="prolanis kelompok dm">Prolanis Kelompok DM</option>
                        <option value="tb paru">TB Paru</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="font-size: 14px;">Simpan</button>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary" style="font-size: 14px;">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection