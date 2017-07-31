<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 
    						'profile_pic', 
    						'first_name',  
    						'last_name',  
    						'full_name',  
    						'country', 
    						'twitter', 
    						'facebook', 
    						'skype', 
    						'linkedin', 
    						'options'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getOptionsAttribute($value)
    {
        return unserialize($value);
    }
    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = serialize($value);
    }
}
