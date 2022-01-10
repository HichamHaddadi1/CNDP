<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'starting_at',
        'ending_at',
        'event_mode',
        'event_lang',
        'event_theme',
        'event_statue',
        'event_desc',
        'id_room',
        'id_user' 
	];


}
