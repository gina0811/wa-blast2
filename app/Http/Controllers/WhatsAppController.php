<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledMessage;
use App\Models\ReceivedMessage;
use App\Models\ContactModel;

class WhatsAppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function sender()
    {
        return view('wa.sender');
    }

    public function schedule()
    {
        $scheduledMessages = ScheduledMessage::orderBy('scheduled_time', 'desc')->paginate(10);
        return view('wa.schedule', compact('scheduledMessages'));
    }

    public function autoReply()
    {
        return view('wa.auto-reply');
    }

    public function contacts()
    {
        // Ambil semua data kontak dari database
        $contacts = ContactModel::all(); 
        return view('wa.contacts', compact('contacts'));
    }

    public function receive()
    {
        $receivedMessages = ReceivedMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('wa.receive', compact('receivedMessages'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string|max:500',
        ]);

        try {
            // Logika pengiriman pesan API WhatsApp
            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
    }
}
