<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogProduk extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_produks';

    protected $fillable = [
        'produk_id',
        'user_id',
        'activity',
        'qty',
        'created_at',
        'updated_at'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
