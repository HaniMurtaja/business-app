<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPoint extends Model
{
    
    use SoftDeletes;
    protected $table = 'users_points';
    protected $fillable = ['user_id', 'points'];
    protected $hidden = ['updated_at', 'deleted_at'];

}