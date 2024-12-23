<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\ReceivedMessage;
use App\Models\ScheduledMessage;
use App\Services\WhatsappService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function sender()
    {
        $contacts = ContactModel::all();
        return view('wa.sender', compact('contacts'));
    }

    public function schedule()
    {
        $contacts = ContactModel::all();
        $scheduledMessages = ScheduledMessage::orderBy('scheduled_time', 'desc')->paginate(10);
        return view('wa.schedule', compact('scheduledMessages','contacts'));
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
        $bulk = [];
        foreach ($request->number as $number) {
            $bulk[] = [
                "number" => $number,
                "message" => $request->message,
            ];

        }

        $whatsappService = new WhatsappService();
        $whatsappService->sendBulkMessage(compact('bulk'));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
