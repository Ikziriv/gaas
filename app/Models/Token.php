<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'token', 'created_at', 'expiry_at', 'type'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::now();
    }

    public function setExpiryAtAttribute($value)
    {
        $this->attributes['expiry_at'] = Carbon::now()->addHours(env('TOKEN_EXPIRY'));
    }

    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = uniqid();
    }
}
