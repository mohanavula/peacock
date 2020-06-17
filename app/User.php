<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Eloquent implements Authenticatable
{
    use Notifiable;
    use AuthenticatableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $connection = 'mongodb';
    protected $collection = 'users';

    
    protected $fillable = [
        'name', 'email', 'password', 'college_id'
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
}
