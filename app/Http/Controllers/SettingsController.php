<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Menampilkan halaman settings
        return view('settings');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'setting_key' => 'required|string',
            'setting_value' => 'required|string',
        ]);

        // Simpan pengaturan
        // Contoh: Simpan ke database
        // Setting::updateOrCreate(['key' => $request->setting_key], ['value' => $request->setting_value]);

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
