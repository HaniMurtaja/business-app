<?php

namespace App\Models;
use App\Models\Offer;
use App\Models\Order;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{

    use SoftDeletes ;
    public $table = 'notifications';
    protected $fillable = ['from_dashboard', 'random_key', 'user_id', 'tag', 'tag_id', 'message'];
    protected $hidden = ['updated_at','deleted_at'];


    protected $with = ['order'];
  
    public function order(){
        return $this->belongsTo(Order::class, 'tag_id')->withTrashed();
    }


}
