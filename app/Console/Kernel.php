<?php

namespace App\Console;

use App\Models\ScheduledMessage;
use App\Http\Controllers\WhatsAppController;

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        // Ambil pesan yang terjadwal dan belum terkirim
        $messages = ScheduledMessage::where('send_at', '<=', now())
                                     ->where('is_sent', false)
                                     ->get();

        foreach ($messages as $message) {
            // Kirim pesan menggunakan WhatsAppController
            try {
                app(WhatsAppController::class)->sendMessage($message->phone_number, $message->message);

                // Tandai pesan sebagai terkirim
                $message->is_sent = true;
                $message->save();

                \Log::info("Pesan terkirim ke {$message->phone_number}");
            } catch (\Exception $e) {
                \Log::error("Gagal mengirim pesan ke {$message->phone_number}: " . $e->getMessage());
            }
        }
    })->everyMinute();
}
