<?php

namespace App\Http\Controllers;

use App\Models\ScheduledMessage;
use Illuminate\Http\Request;

class ScheduleMessageController extends Controller
{
    public function index()
    {
        // Ambil semua pesan terjadwal
        $scheduledMessages = ScheduledMessage::all();
        return view('wa.schedule', compact('scheduledMessages'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
            'send_at' => 'required|date',
        ]);

        // Simpan pesan terjadwal
        ScheduledMessage::create([
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'send_at' => $request->send_at,
        ]);

        return redirect()->route('wa.schedule')->with('success', 'Message scheduled successfully!');
    }

    public function destroy($id)
    {
        // Hapus pesan terjadwal
        ScheduledMessage::findOrFail($id)->delete();
        return redirect()->route('wa.schedule')->with('success', 'Message deleted successfully!');
    }
}
