<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almanaki extends Model
{
    protected $table='almanakis';
    protected $fillable = ['tarehe', 'tukio'];
}
