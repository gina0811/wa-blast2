<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    // Menampilkan halaman dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Menampilkan halaman WhatsApp sender
    public function sender()
    {
        return view('wa.sender');
    }

    // Menampilkan halaman WhatsApp schedule
    public function schedule()
    {
        return view('wa.schedule');
    }

    // Menampilkan halaman auto-reply
    public function autoReply()
    {
        return view('wa.auto-reply');
    }

    // Menampilkan halaman kontak WhatsApp
    public function contacts()
    {
        return view('wa.contacts');
    }

    // Menampilkan halaman untuk menerima pesan WhatsApp
    public function receive()
    {
        return view('wa.receive');
    }

    // Menangani pengiriman pesan WhatsApp
    public function sendMessage(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
        ]);

        // Logika untuk mengirim pesan WhatsApp
        $phoneNumber = $request->input('phone_number');
        $message = $request->input('message');

        // Di sini Anda bisa menggunakan API WhatsApp atau library lain untuk mengirim pesan
        // Misalnya, panggil fungsi API pengiriman pesan WhatsApp
        // WhatsAppAPI::send($phoneNumber, $message); // Contoh panggilan API fiktif

        // Setelah mengirim pesan, beri feedback ke pengguna
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
