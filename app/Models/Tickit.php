<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickit extends Model
{
    use HasFactory;
    protected $fillable = [
            'user_id',
            'room_id',
            'event_id'
        ];
}
