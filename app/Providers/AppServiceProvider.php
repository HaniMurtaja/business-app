<?php

namespace App\Providers;

use App\Admin;

use App\Models\Language;
use App\Models\Contact;

use Carbon\Carbon;

use App\User;
use App\Models\Setting;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Order;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Auth;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) 
        {

            $orders_count = 0;
            // 'orders_count'=> Order::where('status', 'in_progress')->count(),
            
            if(auth()->guard('admin')->user()){
                if(auth()->guard('admin')->user()->type == 'department_manager'){
                    $orders_count = Order::where('category_id', auth()->guard('admin')->user()->category_id)->count();
                }
                elseif(auth()->guard('admin')->user()->type == 'department_employee'){
                    $orders_count = Order::where('employee_id', auth()->guard('admin')->user()->id)->count();
                }
                elseif(auth()->guard('admin')->user()->type == 'admin'){
                    $orders_count = Order::count();
                }                
            }



            $view->with([

                'setting' => Setting::query()->first(),
                'contact'=> Contact::where('read',0)->count(),
                // 'users_count'=> User::where('type', 'user')->count(),
                // 'companies_count'=> User::where('type', 'company')->count(),
                // 'drivers_count'=> User::where('type', 'driver')->count(),
                // 'ads_count'=> Ad::count(),
                'orders_count'=> $orders_count,
                // 'TotalOrdersPrice'=> Order::sum('price'),
                // 'orders_in_the_way_count'=> Order::where('status', 'in_the_way')->count(),
                // 'orders_done_count'=> Order::where('status', 'done')->count(),
                // 'orders_done_total'=> Order::where('status', 'done')->sum('price'),
                // 'orders_canceled_count'=> Order::where('status', 'canceled')->count(),
                // 'rewards_count'=> Reward::count(),              
                // 'users_rewards_count'=> UserReward::groupBy('user_id')->pluck('user_id')->toArray(), 
                // 'availabl_drivers_count' => $availabl_drivers_count,             
                // 'unavailabl_drivers_count' => $unavailabl_drivers_count,             

        ]);
        });
    }



    public function register()
    {
        //
    }
}

