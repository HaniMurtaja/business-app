<?php

namespace App\Models;

use App\User;
use App\Admin;
use App\Models\OrderCampaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Chat;
use App\Models\Category;
use App\Models\Order;


class Order extends Model
{
    
    use SoftDeletes;
    protected $table = 'orders';
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $fillable = ['type', 'employee_id', 'user_id', 'service_id', 'category_id', 'title', 'details', 'payment_method_id', 'quantity', 'price', 
                           'coupon_id', 'coupon_percent', 'coupon_amount', 'final_price', 'employee_percent', 'rate', 'card_number', 'expired_date'];
    protected $with = ['user', 'employee', 'service', 'payment_method'];
    protected $appends = ['admin_chat','category_chat'];


    public function getAdminChatAttribute()
    {
        return Chat::where(['order_id' => $this->id, 'user2' => 0])->first();
    }
    
    
    public function getCategoryChatAttribute()
    {
        return Chat::where(['order_id' => $this->id, 'user2' => null])->where('category_id', '<>', null)->first();
    }
    
    
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }


    public function employee()
    {
        return $this->belongsTo(Admin::class, 'employee_id')->withTrashed();
    }



    public function service()
    {
        return $this->belongsTo(Service::class)->withTrashed();
    }
    
    
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class)->withTrashed();
    }

   
    // public function products()
    // {
    //     return $this->hasMany(OrderProduct::class)->without(['sizes', 'colors']);
    // }






}
