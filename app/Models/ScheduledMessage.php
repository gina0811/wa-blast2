<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_type',
        'is_blast',
        'caption',
        'number',
        'message',
        'start_in',
        'status',
    ];
}
