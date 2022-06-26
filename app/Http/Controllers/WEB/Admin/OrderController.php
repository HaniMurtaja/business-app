<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Admin;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Token;
use App\Models\Notifiy;
use App\Models\City;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\OrderInvoice;
use App\Models\Category;
use App\Models\Reward;

use DB;
use Image;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{


    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }



    public function index(Request $request)
    {

        
        if(auth()->guard('admin')->user()->type == 'department_manager'){
            $items = Category::active()->where('id', auth()->guard('admin')->user()->category_id)->get();
            foreach($items as $one){
                $one->orders = Order::where('category_id', auth()->guard('admin')->user()->category_id)->latest('id')->get();
            }
        }
        elseif(auth()->guard('admin')->user()->type == 'department_employee'){
            $items = Category::active()->where('id', auth()->guard('admin')->user()->category_id)->get();
            foreach($items as $one){
                $one->orders = Order::where('employee_id', auth()->guard('admin')->user()->id)->latest('id')->get();
            }
        }
        else{
            $items = Category::active()->get();
            foreach($items as $one){
                $one->orders = Order::where('category_id', $one->id)->latest('id')->get();
            }
        }
        
        
        return view('admin.orders.home', ['items' => $items]);
    }






    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        if(isset($request->employee_id)){
            $checkAdmin = Admin::findOrFail($request->employee_id);
            $order->employee_id = $request->employee_id;
            $order->employee_percent = $order->final_price / $checkAdmin->salary_amount;
        }
        
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('status', __('cp.update'));
    }




    public function show($id)
    {
        
        $order = Order::findOrFail($id);
        
        $employees = [];
        
        if($order->type == 'service_order' && $order->service_id != null){
            $employees = Admin::where('category_id', $order->category_id)->get();
        }

        return view('admin.orders.orderDetails', ['order' => $order, 'employees' => $employees]);
    }




    public function destroy($id)
    {
        $item = Order::findOrFail($id);
        if ($item) {
            Order::where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }
    



}


