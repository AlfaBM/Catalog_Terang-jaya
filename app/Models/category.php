<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class category extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Category';

    public function catalog(){
        return $this->hasMany(catalog::class);
    }
}
