<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    use Translatable;
    public $translatedAttributes = ['title', 'address', 'description'];
    protected $fillable = ['url', 'logo', 'app_store_url', 'play_store_url', 'info_email', 'mobile', 'phone', 'facebook', 'twitter', 'linked_in', 'instagram', 'latitude', 'longitude', 'image'];

    protected $hidden = ['created_at', 'updated_at', 'translations'];


    public function getLogoAttribute($logo)
    {
        return !is_null($logo)?url('uploads/settings/'.$logo):null;
    }

    
    public function getImageAttribute($image)
    {
        return !is_null($image)?url('uploads/settings/'.$image):null;
    }


}
