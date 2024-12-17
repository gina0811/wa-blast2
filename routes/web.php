<?php

use Illuminate\Support\Facades\Route; // Pastikan Route dikenali
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduledMessageController;
use App\Http\Controllers\AutoReplyController;
use App\Http\Controllers\ContactController;

// Rute untuk halaman utama (Dashboard)
Route::get('/', [WhatsAppController::class, 'dashboard'])->name('dashboard');

// Rute untuk Kontak menggunakan Resource Route
// Pilih salah satu dari dua cara ini:
Route::resource('contacts', ContactController::class);
// Atau jika tidak ingin create dan show
// Route::resource('contacts', ContactController::class)->except(['create', 'show']);

// Kelompokkan rute untuk fitur Auto Reply
Route::prefix('auto-reply')->name('wa.auto-reply.')->group(function () {
    Route::get('/', [AutoReplyController::class, 'index'])->name('index'); // Daftar Auto Reply
    Route::post('/', [AutoReplyController::class, 'store'])->name('store'); // Tambah Auto Reply
    Route::get('/edit/{id}', [AutoReplyController::class, 'edit'])->name('edit'); // Halaman Edit Auto Reply
    Route::put('/{id}', [AutoReplyController::class, 'update'])->name('update'); // Perbarui Auto Reply
    Route::delete('/{id}', [AutoReplyController::class, 'destroy'])->name('destroy'); // Hapus Auto Reply
});

// Kelompokkan rute untuk fitur WhatsApp
Route::prefix('wa')->name('wa.')->group(function () {
    Route::get('/sender', [WhatsAppController::class, 'sender'])->name('sender'); // Halaman pengirim pesan
    Route::post('/send-message', [WhatsAppController::class, 'sendMessage'])->name('send.message'); // Kirim Pesan
    Route::get('/schedule', [WhatsAppController::class, 'schedule'])->name('schedule'); // Jadwal pesan
    Route::get('/auto-reply', [WhatsAppController::class, 'autoReply'])->name('auto-reply'); // Fitur Auto Reply
    Route::get('/contacts', [WhatsAppController::class, 'contacts'])->name('contacts'); // Kelola kontak
    Route::get('/receive', [WhatsAppController::class, 'receive'])->name('receive'); // Terima pesan
});

// Rute untuk Schedule Message
Route::prefix('schedule-message')->name('schedule-message.')->group(function () {
    Route::get('/', [ScheduledMessageController::class, 'index'])->name('index'); // Daftar pesan terjadwal
    Route::get('/create', [ScheduledMessageController::class, 'create'])->name('create'); // Form buat pesan
    Route::post('/', [ScheduledMessageController::class, 'store'])->name('store'); // Simpan pesan
    Route::get('/edit/{id}', [ScheduledMessageController::class, 'edit'])->name('edit'); // Form edit pesan
    Route::put('/{id}', [ScheduledMessageController::class, 'update'])->name('update'); // Update pesan
    Route::delete('/{id}', [ScheduledMessageController::class, 'destroy'])->name('destroy'); // Hapus pesan
});

// Rute untuk halaman pengaturan (Settings)
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index'); // Halaman Pengaturan
    Route::post('/', [SettingsController::class, 'store'])->name('store'); // Simpan Pengaturan
});

// Rute untuk halaman profil (Profile)
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
