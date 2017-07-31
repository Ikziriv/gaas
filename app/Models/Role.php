<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillabel = ['name'];
    protected $id = 'id';
    public $timestamps = false;

    public function users(){
    	return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
