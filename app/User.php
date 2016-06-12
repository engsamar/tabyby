<?php

namespace App;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Krucas\LaravelUserEmailVerification\Contracts\RequiresEmailVerification as RequiresEmailVerificationContract;
use Krucas\LaravelUserEmailVerification\RequiresEmailVerification;

class User extends Authenticatable implements RequiresEmailVerificationContract
{
    use RequiresEmailVerification,CanResetPassword, Messagable;
    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

     public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','address', 'telephone', 'mobile', 'birthdate','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
