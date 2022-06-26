<?php

namespace App;
use App\User;
use App\Models\Order;

use App\Models\Permission;
use App\Models\UserPermission;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;


    protected $fillable = ['name', 'email', 'password', 'mobile', 'image','type']; 
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['deserved_amount'];
    // protected $with = ['areas'];


    public function getDeservedAmountAttribute()
    {   
        return Order::where('employee_id', $this->id)->where('status', 'completed')->sum('employee_percent');
    }
    
    

    public function permission()
    {
        return $this->hasOne(UserPermission::class,'user_id');
    }


    public function getImageAttribute($value)
    {
        return url('uploads/admins/' . $value);
    }
    
    
    public function getIdImageAttribute($value)
    {
        return url('uploads/admins/' . $value);
    }


}
