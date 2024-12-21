@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-primary"><span class="text-muted fw-light">Page/</span> Contact Save</h4>

    <!-- Tambah Kontak Button & Filter -->
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <!-- Tombol Tambah Kontak -->
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addContactModal">Tambah Kontak</button>

            <!-- Filter Kontak -->
            <form id="filter-form" action="{{ route('contacts.index') }}" method="GET" class="d-flex align-items-center" style="margin: 0;">
                <label for="filter_type" class="form-label mb-0 me-2 text-secondary" style="line-height: 1.5;">Filter:</label>
                <select name="filter_type" id="filter_type" class="form-control form-control-sm" style="min-width: 200px; height: auto;" onchange="this.form.submit()">
                    <option value="" {{ request('filter_type') == '' ? 'selected' : '' }}>Semua</option>
                    <option value="prolanis kelompok ht 1" {{ request('filter_type') == 'prolanis kelompok ht 1' ? 'selected' : '' }}>Prolanis Kelompok HT 1</option>
                    <option value="prolanis kelompok ht 2" {{ request('filter_type') == 'prolanis kelompok ht 2' ? 'selected' : '' }}>Prolanis Kelompok HT 2</option>
                    <option value="prolanis kelompok dm" {{ request('filter_type') == 'prolanis kelompok dm' ? 'selected' : '' }}>Prolanis Kelompok DM</option>
                    <option value="tb paru" {{ request('filter_type') == 'tb paru' ? 'selected' : '' }}>TB Paru</option>
                </select>
            </form>
        </div>
    </div>

<!-- Tabel Kontak -->
<div class="card">
    <div class="card-body">
        <table class="table table-bordered border-1 table-hover" style="border-color: #ddd; border-radius: 8px;">
            <thead class="table-light text-center text-dark" style="font-family: 'Arial', sans-serif; font-size: 14px; font-weight: bold; color: #333; background-color: #f0f8ff;">
                <tr style="border-bottom: 1px solid #ddd;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Pasien</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="font-family: 'Verdana', sans-serif; font-size: 12px;">
                @forelse ($contacts as $index => $contact)
                <tr style="border-bottom: 1px dashed #ddd;">
                    <td class="text-center" style="color: #000; font-weight: bold;">{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->type }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kontak ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-danger fw-bold" style="font-family: 'Courier New', monospace; font-size: 14px;">Tidak ada kontak.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Link Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $contacts->links() }}
        </div>
    </div>
</div>


</div>

<!-- Modal Tambah Kontak -->
<div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addContactModalLabel">Tambah Kontak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Jenis Pasien</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="">Pilih Jenis Pasien</option>
                            <option value="prolanis kelompok ht 1">Prolanis Kelompok HT 1</option>
                            <option value="prolanis kelompok ht 2">Prolanis Kelompok HT 2</option>
                            <option value="prolanis kelompok dm">Prolanis Kelompok DM</option>
                            <option value="tb paru">TB Paru</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Handle filter change event
    document.getElementById('filter_type').addEventListener('change', function () {
        const filterForm = document.getElementById('filter-form');
        filterForm.submit(); // Submit the form automatically when filter is changed
    });
</script>
@endsection

<style>
    /* Gaya Khusus */
    body {
        font-family: 'Arial', sans-serif;
        font-size: 14px;
        color: #333;
    }

    h1 {
        font-size: 24px;
        color: #0056b3;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        font-size: 14px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .form-select, .form-control {
        font-size: 14px;
    }

    .modal-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .btn-close {
        font-size: 14px;
    }

    .modal-footer .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
