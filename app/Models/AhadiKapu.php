<?php

// app/Models/Sadaka.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhadiKapu extends Model
{
    use HasFactory;
   protected $table='ahadi_kapus';
    protected $fillable = [
        'kiasi_alichotoa',
    ];
}
