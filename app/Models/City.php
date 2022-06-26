<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes,Translatable;
    protected $table = 'cities';
    public $translatedAttributes = ['name'];
    protected $fillable = ['country_id', 'status'];
    protected $hidden = ['updated_at', 'deleted_at', 'translations'];
    
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/images/cities/' . $value);
    }

}