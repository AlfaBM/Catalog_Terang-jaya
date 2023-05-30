<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Jenssegers\Mongodb\Auth\User as Authenticable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class admin extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Admin';
    protected $fillable = [
        'username',
        'password',
    ];

    public function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => Hash::make($value),
            get: fn($value) => $value
        );
    }
}