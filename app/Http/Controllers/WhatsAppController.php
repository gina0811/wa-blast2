<?php

namespace App\Http\Controllers;

use App\Models\ScheduledMessage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use WhatsAppWeb;  // Pastikan Anda telah mengimpor library WhatsAppWeb yang digunakan

class WhatsAppController extends Controller
{
    // Fungsi untuk mengirim pesan WhatsApp
    public function sendMessage(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
        ]);

        // Mendapatkan nomor telepon yang dimasukkan
        $phoneNumber = $validated['phone_number'];
        $message = $validated['message'];

        try {
            // Membuat instance WhatsAppWeb dan mengirim pesan
            $client = new WhatsAppWeb();
            $client->connect();  // Menghubungkan ke WhatsApp Web
            $client->sendMessage($phoneNumber, $message);  // Mengirim pesan

            return back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menjadwalkan pesan
    public function schedule(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
            'send_at' => 'required|date|after:now',
        ]);

        // Simpan pesan terjadwal
        ScheduledMessage::create([
            'phone_number' => $validated['phone_number'],
            'message' => $validated['message'],
            'send_at' => Carbon::parse($validated['send_at']),
        ]);

        return back()->with('success', 'Message scheduled successfully!');
    }
}
