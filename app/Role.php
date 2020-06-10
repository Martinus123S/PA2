<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    //
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'role',
    ];

    public function user(){
        $this->hasOne('App\User');
    }
}
