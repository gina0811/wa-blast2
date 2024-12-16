<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleMessageController;

// Rute untuk halaman utama (dashboard)
Route::get('/', [WhatsAppController::class, 'dashboard'])->name('dashboard');

// Kelompokkan rute untuk WhatsApp
Route::prefix('wa')->group(function () {
    // Rute untuk mengirim pesan
    Route::post('/send-message', [WhatsAppController::class, 'sendMessage'])->name('wa.send.message');
    Route::get('/sender', [WhatsAppController::class, 'sender'])->name('wa.sender');
    Route::get('/schedule', [WhatsAppController::class, 'schedule'])->name('wa.schedule');
    Route::get('/auto-reply', [WhatsAppController::class, 'autoReply'])->name('wa.auto-reply');
    Route::get('/contacts', [WhatsAppController::class, 'contacts'])->name('wa.contacts');
    Route::get('/receive', [WhatsAppController::class, 'receive'])->name('wa.receive');
});

// Rute untuk halaman pengaturan
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings', [SettingsController::class, 'store'])->name('post.settings');

// Rute untuk halaman profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Rute untuk halaman penjadwalan pesan (Schedule Message)
Route::prefix('schedule-message')->name('wa.schedule.')->group(function () {
    Route::get('/', [ScheduleMessageController::class, 'index'])->name('index'); // Menampilkan daftar pesan terjadwal
    Route::post('/', [ScheduleMessageController::class, 'store'])->name('store'); // Menambahkan pesan terjadwal
    Route::get('/edit/{id}', [ScheduleMessageController::class, 'edit'])->name('edit'); // Halaman edit pesan
    Route::put('/{id}', [ScheduleMessageController::class, 'update'])->name('update'); // Memperbarui pesan terjadwal
    Route::delete('/{id}', [ScheduleMessageController::class, 'destroy'])->name('destroy'); // Menghapus pesan terjadwal
});
