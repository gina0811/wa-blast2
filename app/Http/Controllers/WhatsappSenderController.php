<?php

namespace App\Http\Controllers;

use App\Services\WhatsappService;

class WhatsappSenderController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsappService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function index()
    {
        $whatsappService = new WhatsappService;

        try {
            $whatsapp = $whatsappService->connectWhatsapp();
            \Log::info('WhatsApp Status:', $whatsapp);
        } catch (\Exception $e) {
            \Log::error('Failed to connect to WhatsApp service:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to connect to WhatsApp service.');
        }

        return view('whatsapp', compact('whatsapp'));
    }

    public function logout()
    {
        try {
            $this->whatsappService->logoutWhatsapp();
            return redirect()->route('whatsapp.index')->with('success', 'Anda telah logout dari WhatsApp.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
