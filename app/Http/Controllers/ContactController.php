<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index(Request $request)
    {
        // Get search query, perPage, and filter_type values
        $search = $request->input('search');
        $perPage = $request->input('perPage', 10);
        $filterType = $request->input('filter_type') ?? '';

        // Fetch contacts with filtering and pagination
        $contacts = ContactModel::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%");
                });
            })
            ->when($filterType, function ($query) use ($filterType) {
                $query->where('type', 'like', "%$filterType%");
            })
            ->paginate($perPage);

        // Preserve query string
        $contacts->appends($request->all());

        return view('contacts.index', compact('contacts'));
    }


    // Menambahkan kontak baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]+$/|max:15',
            'type' => 'required|string|in:prolanis kelompok ht 1,prolanis kelompok ht 2,prolanis kelompok dm,tb paru',
        ]);

        ContactModel::create($request->only('name', 'phone', 'type'));

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    // Menampilkan form tambah kontak
    public function create()
    {
        return view('contacts.create');
    }

    // Mengedit kontak
    public function edit($id)
    {
        $contact = ContactModel::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    // Memperbarui kontak
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]+$/|max:16',
            'type' => 'required|string|in:prolanis kelompok ht 1,prolanis kelompok ht 2,prolanis kelompok dm,tb paru',
        ]);

        $contact = ContactModel::findOrFail($id);
        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Kontak tidak ditemukan.');
        }
        $contact->update($request->only('name', 'phone', 'type'));

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    // Menghapus kontak
    public function destroy($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }

    // Menghapus semua kontak
    public function deleteAll()
    {
        ContactModel::truncate();

        return redirect()->route('contacts.index')->with('success', 'Semua kontak berhasil dihapus.');
    }
}
