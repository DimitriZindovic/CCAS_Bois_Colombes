<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'birth',
        'address',
        'city',
        'phone',
        'card_identity',
        'email',
        'password',
        'role',
        'email_verified_at',
        'domicile_certificate',
        'signature',
    ];

    protected $casts = [
        'birth' => 'date',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
