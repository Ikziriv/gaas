<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailProduk;

class Produk extends Model
{
    protected $fillable = [
        'nama', 
        'slug', 
        'qty', 
        'kategori_id', 
    ];
    
    public function pesan() 
    {
      return $this->hasMany('App\Models\Pesanan');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\DetailProduk');
    }

    public function kategories()
    {
        return $this->belongsToMany('App\Models\Kategori', 'kategori_id', 'id');
    }
}
