<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    
    protected $fillable = ['locale', 'setting_id', 'title', 'address', 'description'];
    protected $hidden = ['created_at', 'updated_at'];

}
