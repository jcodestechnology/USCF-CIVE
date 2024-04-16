<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahadi extends Model
{
    use HasFactory;
   protected $table='ahadis';
    protected $fillable = [
        'user_id',
        'aina_ya_sadaka',
        'ahadi_yangu',
        'kiasi_alichotoa',
        'year',
        'tarehe_ya_jumapili',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
