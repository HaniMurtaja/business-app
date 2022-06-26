<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

use App\Admin;
use App\Models\Service;
use App\Models\Order;


class Category extends Model
{

    public $translatedAttributes = ['name'];

    use SoftDeletes,Translatable;
    protected $table = 'categories';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    protected $appends = ['services_count'];


    public function emps(){
        return $this->hasMany(Admin::class);
    }
    
    
    public function services(){
        return $this->hasMany(Service::class);
    }
    
    
    // public function orders(){
    //     return $this->hasMany(Order::class);
    // }
    

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

    
    public function getImageAttribute($value)
    {
        if($value){
            return url('uploads/categories/' . $value);
        }
    }


    public function getServicesCountAttribute()
    {
        return Service::where('category_id', $this->id)->count();
    }



}
