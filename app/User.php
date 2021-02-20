<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',

        'email',

        'type',

        'department',

        'email_verified_at',

        'password',

        'state',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function isGodMODE()

    {

        if($this->type == 'SuperAdmin')

        {

            return true;

        }

        else

        {

            return false;

        }

    }

    public function isMember()

    {

        if($this->type == 'Web Developer' or $this->type == 'Frontend Developer' or $this->type == 'Sale Exicutive' or $this->type == 'Graphics Designer')

        {

            return true;

        }

        else

        {

            return false;

        }

    }
    public function isManager()
    {
        if($this->type == "Manager"){
            return true;
        }
        else{
            return false;
        }
    }
}
