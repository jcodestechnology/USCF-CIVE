<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamatiMapato extends Model
{
    use HasFactory;
    protected $table='kamati_mapato';
    protected $fillable = [
        'tarehe',
        'aina_ya_mapato',
        'kiasi_cha_mapato',
        'risiti',
    ];
}
