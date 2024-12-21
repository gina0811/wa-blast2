<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index(Request $request)
    {
        $query = ContactModel::query();

        if ($request->has('filter_type') && $request->filter_type) {
            $query->where('type', $request->filter_type);
        }

        // Ubah get() menjadi paginate(10) untuk pagination
        $contacts = $query->orderBy('created_at', 'desc')->paginate(2);

        return view('contacts.index', compact('contacts'));
    }

    // Menambahkan kontak baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]+$/|max:15|unique:contacts,phone',
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
            'phone' => 'required|string|regex:/^[0-9]+$/|max:15|unique:contacts,phone,' . $id,
            'type' => 'required|string|in:prolanis kelompok ht 1,prolanis kelompok ht 2,prolanis kelompok dm,tb paru',
        ]);

        $contact = ContactModel::findOrFail($id);
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
