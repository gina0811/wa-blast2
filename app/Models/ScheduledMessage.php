<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'message', 'send_at', 'sent'
    ];

    protected $casts = [
        'send_at' => 'datetime',
    ];
}