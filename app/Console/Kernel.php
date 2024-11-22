<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Menambahkan penjadwalan otomatis
        $schedule->call(function () {
            // Logika untuk memeriksa dan mengirim pesan
            $messages = \App\Models\ScheduledMessage::where('send_at', '<=', now())
                                                      ->where('sent', false)
                                                      ->get();
            foreach ($messages as $message) {
                // Mengirim pesan
                app(\App\Http\Controllers\WhatsAppController::class)->sendMessage($message->phone_number, $message->message);
                // Tandai pesan sebagai sudah terkirim
                $message->sent = true;
                $message->save();
            }
        })->everyMinute();  // Menjadwalkan setiap menit
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
