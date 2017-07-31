<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['name', 'created_at', 'update_at'];

    public function produks()
    {
        return $this->belongsToMany('App\Models\Produk');
    }
}
