<?php
namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends Model
{
    use SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'slug', 'description', 'key_words'];
    protected $fillable = ['image'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'translations'];


    public function getImageAttribute($value)
    {
        return url('uploads/pages/' . $value);
    }


    public function getvideoAttribute($value)
    {
        if($value != '' && $value != NULL){
            return url('uploads/pages/' . $value);
        }
    }


}

