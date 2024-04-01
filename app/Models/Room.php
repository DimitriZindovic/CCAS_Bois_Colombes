<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'image',
        'message',
        'date',
        'event_id',
        'user_id'
    ];

    protected $dates = ['date'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
