<?php

namespace App\Http\Controllers;

use App\Services\WhatsappService;

class DashboardController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsappService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function checkStatus(WhatsappService $whatsappService)
    {
        try {
            $whatsapp = $whatsappService->connectWhatsapp();
            return response()->json(['status' => $whatsapp['data'] ?? null]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error'], 500);
        }
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

        $stats = [
            ['title' => 'Messages Sent', 'value' => '123 Messages'],
            ['title' => 'Scheduled Messages', 'value' => '4 Messages'],
            ['title' => 'Contacts Saved', 'value' => '50 Contacts'],
            ['title' => 'Auto Replies', 'value' => '3 Replies']
        ];

        return view('dashboard', compact('whatsapp', 'stats'));
    }

    public function logout()
    {
        try {
            $this->whatsappService->logoutWhatsapp();
            \Log::info('Successfully logged out from WhatsApp');
            return redirect()->route('dashboard.index')->with('success', 'Anda telah logout dari WhatsApp.');
        } catch (\Exception $e) {
            \Log::error('Logout error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat logout.');
        }
    }

}
