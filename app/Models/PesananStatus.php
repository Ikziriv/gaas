<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananStatus extends Model
{
    protected $table = 'pesanan_stats';
    protected $fillabel = ['name', 'slug'];
    protected $id = 'id';
    public $timestamps = false;

    public function pembeli(){
    	return $this->hasMany('App\Models\Pesanan', 'status_id', 'id');
    }
}
