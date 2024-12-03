<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;

// Route untuk mengirim pesan
Route::post('/send-message', [WhatsAppController::class, 'sendMessage'])->name('send.message');

// Route untuk halaman utama (Dashboard)
Route::get('/', function () {
    return view('dashboard'); // Halaman utama setelah login
})->name('dashboard');

// Web.php

// Route untuk menu dashboard
Route::get('/dashboard', [WhatsAppController::class, 'dashboard'])->name('dashboard');

// Route untuk halaman WhatsApp sender, schedule, auto-reply, dan lainnya
Route::get('/wa/sender', [WhatsAppController::class, 'sender'])->name('wa.sender');
Route::get('/wa/schedule', [WhatsAppController::class, 'schedule'])->name('wa.schedule');
Route::get('/wa/auto-reply', [WhatsAppController::class, 'autoReply'])->name('wa.auto-reply');
Route::get('/wa/contacts', [WhatsAppController::class, 'contacts'])->name('wa.contacts');
Route::get('/wa/receive', [WhatsAppController::class, 'receive'])->name('wa.receive');

// Route untuk halaman pengaturan
Route::get('/settings', function () {
    return view('settings'); 
// Halaman pengaturan
})->name('settings');

// Route untuk halaman profil
Route::get('/profile', function () {
    return view('profile'); // Halaman profil
})->name('profile');

