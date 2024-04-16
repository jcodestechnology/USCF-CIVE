<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Matangazo extends Model
{
    use HasFactory;
   protected $table='matangazos';
    protected $fillable = [
        'headline',
        'content',
        'expiration_date',
    ];

 

public function isReadByUser()
{
    $user = Auth::user();
    if (!$user) {
        return false; // If user is not authenticated, assume the post is not read
    }

    return $this->readers->contains($user->id);
}

    public function readers()
{
    return $this->belongsToMany(User::class, 'read_posts');
}

}
