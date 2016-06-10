<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Krucas\LaravelUserEmailVerification\Contracts\RequiresEmailVerification as RequiresEmailVerificationContract;
use Krucas\LaravelUserEmailVerification\RequiresEmailVerification;

class User extends Authenticatable implements RequiresEmailVerificationContract
{
    use RequiresEmailVerification;
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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','address', 'telephone', 'mobile', 'birthdate',
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
