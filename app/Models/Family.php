<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table='families';
    protected $fillable = [
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        // Add any other attributes you want to include for the family
    ];
    

    public function members()
    {
        return $this->belongsToMany(User::class, 'family_user', 'family_id', 'user_id');
    }
    public function father()
    {
        return $this->belongsTo(User::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(User::class, 'mother_id');
    }

    
}
