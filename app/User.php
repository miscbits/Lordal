<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    protected $casts = [
        "staff" => "boolean",
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student() {
        return $this->hasOne(Student::class);
    }

    /**
     * @return boolean
     */
    public function isStudent() {
        return ! $this->staff;
    }

    /**
     * @return boolean
     */
    public function isStaff() {
        return $this->staff;
    }

}
