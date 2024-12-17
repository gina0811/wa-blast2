<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledMessage;

class ScheduledMessageController extends Controller
{
    public function index()
    {
        // Ambil semua data Scheduled Messages dari database
        $scheduledMessages = ScheduledMessage::all();

        // Kirim variabel ke view
        return view('scheduled-messages.index', compact('scheduledMessages'));
    }
}
