<?php

namespace App\Http\Controllers;

use App\Models\ContactModel; // Menggunakan model Eloquent
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index()
    {
        $contacts = ContactModel::all(); // Mengambil semua data kontak
        return view('contacts.index', compact('contacts'));
    }

    // Menambahkan kontak baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        ContactModel::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    // Menghapus kontak
    public function destroy($id)
    {
        ContactModel::destroy($id);
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }
}
