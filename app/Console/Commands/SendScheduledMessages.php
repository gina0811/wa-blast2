<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ScheduledMessage;
use GuzzleHttp\Client;
use Carbon\Carbon;

class SendScheduledMessages extends Command
{
    protected $signature = 'send:scheduled-messages';
    protected $description = 'Send scheduled messages via WhatsApp';

    public function handle()
    {
        $client = new Client();
        $now = Carbon::now();

        $messages = ScheduledMessage::where('send_at', '<=', $now)
                                    ->where('is_sent', false)
                                    ->get();

        foreach ($messages as $message) {
            try {
                $response = $client->post('https://your-whatsapp-api/send', [
                    'form_params' => [
                        'phone' => $message->phone_number,
                        'message' => $message->message,
                    ],
                ]);

                if ($response->getStatusCode() === 200) {
                    $message->update(['is_sent' => true]);
                    $this->info('Message sent to ' . $message->phone_number);
                }
            } catch (\Exception $e) {
                $this->error('Failed to send message to ' . $message->phone_number);
            }
        }

        $this->info('Scheduled messages processed.');
    }
}
