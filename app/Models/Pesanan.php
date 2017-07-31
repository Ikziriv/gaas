<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pesanans';

    protected $fillable = [
        'customer_id', 
        'produk_id', 
        'new', 
        'otw',
        'done',
        'qty'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\PesananStatus');
    }
}
