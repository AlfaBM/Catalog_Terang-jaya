<?php

namespace App\Models;

use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class catalog extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Catalog';

    public function harga(): Attribute
    {
        return new Attribute(
            set: fn($value) => intval($value),
            get: fn($value) => intval($value)
        );
    }

    use HasFactory;
    public function category(){
        return $this->belongsTo(category::class);
    }
}

