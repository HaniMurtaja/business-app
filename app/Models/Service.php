<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Photo;

use App\Models\Setting;
use App\Models\FavoriteProduct;

use app\User;

class Service extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'services';
    public $translatedAttributes = ['title', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    protected $with = ['category'];
    protected $appends = ['active_price', 'photos'];

    public function getActivePriceAttribute()
    {
        if($this->type == 'fixed_price' && $this->offer_price != null && $this->offer_price > 0){
            return $this->offer_price;
        }
            return $this->price;
    }

    public function getPhotosAttribute()
    {
        $otherPhotos = Photo::where('attachmentable_id', $this->id)->where('attachmentable_type', 'App\Models\Service')->get();
        return $otherPhotos;
    }
    
    

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    
    // public function getPhotosAttribute()
    // {
    //     $otherPhotos = Photo::where('product_id', $this->id)->pluck('image')->toArray();
    //     array_unshift($otherPhotos, $this->image);
    //     return $otherPhotos;
    // }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    
    

    public function getImageAttribute($value)
    {
        return url('uploads/services/' . $value);
    }
    


}
