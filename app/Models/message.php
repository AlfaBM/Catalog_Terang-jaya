<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Moloquent\Eloquent\Model as Eloquent;

class message extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Message';
}
