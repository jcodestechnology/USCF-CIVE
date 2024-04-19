<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $table='users';
    protected $fillable = [

      
        'email',
        'password',
            'firstname',
            'middlename',
            'lastname',
            'phone',
            'user_role',
            'program_id',
            'block',
            'profile',
            'year_started',
            'year_completion',
            'gender',
           
        ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define relationships if needed
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function ahadis()
    {
        return $this->hasMany(Ahadi::class);
    }

    public function ahadiUpdates()
    {
        return $this->hasMany(Ahadi::class);
    }

    public function families()
{
    return $this->belongsToMany(Family::class, 'family_user');
}
public function family()
{
    return $this->hasOne(Family::class, 'id');
}

public function readPosts()
{
    return $this->belongsToMany(Matangazo::class, 'read_posts');
}

}
