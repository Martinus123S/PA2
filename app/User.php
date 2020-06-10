<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use tidy;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    // public $role_id;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primayKey = 'username';
    protected $fillable = [
        'nama', 'username', 'email','no_telpon','password','id_role'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public $timestamps = false;
}
