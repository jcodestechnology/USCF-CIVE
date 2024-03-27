<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sadaka extends Model
{
    use HasFactory;
    protected $table='sadakas';
    protected $fillable = [
        'date',
        'sadaka_jumapili',
        'kumtunza_mchungaji',
        'mnada',
        'shukrani_ya_pekee',
        'changizo',
    ];
}
