<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maoni extends Model
{
    use HasFactory;
    protected $table='maoni';

    protected $fillable = ['maelezo'];
}
