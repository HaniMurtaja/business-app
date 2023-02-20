<?php

namespace App;

use App\Admin;

use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\NotificationMessage;
use App\Models\Notice;
use App\Models\Order;
use App\Models\UserReward;


use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use Notifiable,HasApiTokens,SoftDeletes;
    protected $hidden = ['password', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'phone', 'email', 'mobile', 'password', 'latitude', 'longitude', 'image_profile', 'status', 'notification_status'];
    // protected $appends = ['orders_count', 'actual_orders'];



    public function getActualOrdersAttribute()
    {   
        if($this->type == 'driver'){
            return Order::where('driver_id', $this->id)->whereMonth('updated_at', date('m'))->whereYear('updated_at', date('Y'))->count();
        }
        return 0;
    }


    public function rewards()
    {
        return $this->hasMany(UserReward::class);
    }



    public function getOrdersCountAttribute()
    {   
        if($this->type == 'company'){
            return Order::where('company_id', $this->id)->count();
        }
        elseif($this->type == 'user'){
            return Order::where('user_mobile', $this->mobile)->count();
        }
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }



    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }

    


    public function getImageProfileAttribute($value)
    {
        if($value){
            
            $word = "http";

            if(strpos($value, $word) !== false){
                return $value;
            } else{
                return url('uploads/users/' . $value);
            }       
            
        }else{
            return url('uploads/icons/default_user.png');
        }
    }



    public function getLicenseAttribute($value)
    {
        if($value){
            return url('uploads/users/' . $value);
        }
    }



    



}
