<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use App\Models\Product;

class Cart extends Model
{

    use SoftDeletes;
    protected $table = 'cart';
    protected $fillable = ['user_id', 'product_id', 'quantity'];
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $with = ["product"];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

 

}
