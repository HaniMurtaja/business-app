<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;
    protected $fillable = ['name', 'email','message','mobile'];
    protected $hidden = ['updated_at'];
    
    
    public function getEmailAttribute($value)
    {
        if($value != null){
            return $value;
        }else{
            return $this->user->email;
        }
        // return Chat::where(['order_id' => $this->id, 'user2' => 0])->first();
    }
    
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }

    
}
