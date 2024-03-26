<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NenoLaWeek extends Model
{
    use HasFactory;

    protected $table = 'neno_la_week';
    protected $fillable = ['kichwa', 'kifungu', 'maelezo'];
}
