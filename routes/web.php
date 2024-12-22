<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\AutoReplyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceivedMessageController;
use App\Http\Controllers\ScheduledMessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WhatsAppController;use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
    Route::get('/', [WhatsAppController::class, 'dashboard'])->name('dashboard');
// Contacts (Resource Route)
    Route::resource('contacts', ContactController::class);
    Route::get('/wa/contacts', [WhatsAppController::class, 'contacts'])->name('wa.contacts');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Auto Reply Routes
    Route::prefix('wa')->name('wa.')->group(function () {
        Route::resource('auto-reply', AutoReplyController::class);
        Route::get('/', [AutoReplyController::class, 'index'])->name('index');
        Route::get('/create', [AutoReplyController::class, 'create'])->name('create');
        Route::post('/', [AutoReplyController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AutoReplyController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AutoReplyController::class, 'update'])->name('update');
        Route::delete('/{id}', [AutoReplyController::class, 'destroy'])->name('destroy');
    });

// WhatsApp Routes
    Route::prefix('wa')->name('wa.')->group(function () {
        Route::get('/sender', [WhatsAppController::class, 'sender'])->name('sender');
        Route::post('/send-message', [WhatsAppController::class, 'sendMessage'])->name('send.message');
        Route::get('/schedule', [WhatsAppController::class, 'schedule'])->name('schedule');
        Route::get('/auto-reply', [WhatsAppController::class, 'autoReply'])->name('auto-reply');
        Route::get('/contacts', [WhatsAppController::class, 'contacts'])->name('contacts');
        Route::get('/receive', [WhatsAppController::class, 'receive'])->name('receive');
    });

// Schedule Message Routes
    Route::prefix('schedule-message')->name('schedule-message.')->group(function () {
        Route::get('/', [ScheduledMessageController::class, 'index'])->name('index');
        Route::get('/create', [ScheduledMessageController::class, 'create'])->name('create');
        Route::post('/', [ScheduledMessageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ScheduledMessageController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ScheduledMessageController::class, 'update'])->name('update');
        Route::delete('/{id}', [ScheduledMessageController::class, 'destroy'])->name('destroy');
    });

// Receive Messages Routes
    Route::prefix('receive-messages')->name('received-messages.')->group(function () {
        Route::get('/', [ReceivedMessageController::class, 'index'])->name('index');
        Route::delete('/delete-all', [ReceivedMessageController::class, 'deleteAll'])->name('deleteAll');
    });

// Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings');
        Route::post('/', [SettingsController::class, 'store'])->name('post.settings');
    });

// Profile Route
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

});
