<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Admin;
use App\User;

use App\Models\Ad;

use App\Models\CompetitionRegistration;
use App\Models\Contact;
use App\Models\Article;



use App\Models\Permission;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Coupon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class HomeController extends Controller
{
    
   
    public function index()
    {
        // $admin = Admin::findOrFail(auth()->guard('admin')->user()->id);
        // $competitions_registrations  = CompetitionRegistration::latest('id')->take(9)->get();
        // $contacts  = Contact::latest('id')->take(10)->get();
        // $articles  = Article::latest('id')->take(5)->get();
        // $events  = Event::latest('id')->take(5)->get();
        // $galleries  = Gallery::latest('id')->take(5)->get();

        return view('admin.home.dashboard');
    }


    public function changeStatus($model,Request $request)
    {
        $role = "";

        if($model == "users") $role = 'App\User';
        if($model == "companies") $role = 'App\User';
        if($model == "employees") $role = 'App\Admin';
        
        if($model == "ads") $role = 'App\Models\Ad';
        if($model == "notifications") $role = 'App\Models\Notification';
        if($model == "categories") $role = 'App\Models\Category';
        if($model == "contact") $role = 'App\Models\Contact';
        if($model == "coupons") $role = 'App\Models\Coupon';
        if($model == "orders") $role = 'App\Models\Order';
        if($model == "services") $role = 'App\Models\Service';
        if($model == "payments_methods") $role = 'App\Models\PaymentMethod';
        if($model == "packages") $role = 'App\Models\Package';
        if($model == "packages_properties") $role = 'App\Models\PackageProperty';



        if($role !=""){
             if ($request->action == 'delete') {
                $role::query()->whereIn('id', $request->IDsArray)->delete();
            }
            else {
                if($request->action) {
                    $role::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->action]);
                }
            }

            return $request->action;
        }
        return false;
        
  
    }
     
 

    public function getCities($id){
        return City::where(['country_id' => $id, 'status' => 'active'])->get();
    }

    public function getCountries(){
        return Country::where(['status' => 'active'])->get();
    }


 
}
