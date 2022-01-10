<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'id_user',
        'room_name',
        'room_desc',
        'moderator_pw',
        'viewer_pw',
        'max_viewers',
        'verified',
        'presentations'
        ];
    public function user()
    {
        return $this->belongsTo(User::class , 'id_user');
    }

}
