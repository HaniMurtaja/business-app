<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Admin;

use App\Models\Category;
use App\Models\Setting;

use Carbon\Carbon;

use Dotenv\Exception\ValidationException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;
use Image;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{


    public function __construct()
    {
        $this->settings = Setting::query()->first();
        view()->share(['settings' => $this->settings]);
    }



    public function index(Request $request)
    {

        if(auth()->guard('admin')->user()->type == 'department_manager' ){
            $items = Category::active()->where('id', auth()->guard('admin')->user()->category_id)->get();
        }

        elseif(auth()->guard('admin')->user()->type == 'admin'){
            $items = Category::active()->get();
        }

        return view('admin.employees.home', ['items' => $items]);
    }



    public function create()
    {
         if(auth()->guard('admin')->user()->type == 'department_manager' ){
            $categories = Category::active()->where('id', auth()->guard('admin')->user()->category_id)->get();
        }

        elseif(auth()->guard('admin')->user()->type == 'admin'){
            $categories = Category::active()->get();
        }
        
        return view('admin.employees.create', ['categories' => $categories]);
    }




    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:admins|digits_between:8,16',
            'email' => 'required|unique:admins',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $item = new Admin();
        $item->type = $request->type;
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        // $item->address = $request->address;
        $item->password = bcrypt($request->password);
        // $item->latitude = $request->lat;
        // $item->longitude = $request->lng;
        $item->status = 'active';
        $item->salary_type = $request->salary_type;
        $item->salary_amount = $request->salary_amount;

        if($request->hasFile('image_profile1')) {
            $image = $request->file('image_profile1');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/admins/$file_name");
            $item->id_image = $file_name;
        }

        if($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/admins/$file_name");
            $item->image = $file_name;
        }

        $item->save();
        return redirect()->route('admin.employees.index')->with('status', __('cp.create'));
    }



    public function edit($id)
    {
        $item = Admin::findOrFail($id);
        
         if(auth()->guard('admin')->user()->type == 'department_manager' ){
            $categories = Category::active()->where('id', auth()->guard('admin')->user()->category_id)->get();
        }

        elseif(auth()->guard('admin')->user()->type == 'admin'){
            $categories = Category::active()->get();
        }
        
        return view('admin.employees.edit',['item' => $item, 'categories' => $categories]);
    }


    public function show($id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.employees.show',['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $item = Admin::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits_between:8,116|unique:admins,mobile,'.$item->id,
            'email' => 'required|unique:admins,mobile,'.$item->id,
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->type = $request->type;
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        // $item->address = $request->address;
        $item->password = bcrypt($request->password);
        $item->status = 'active';
        $item->salary_type = $request->salary_type;
        $item->salary_amount = $request->salary_amount;
        
        // if($request->lat){
        //     $item->latitude = $request->lat;
        // }

        // if($request->lng){
        //     $item->longitude = $request->lng;
        // }
        
        
        if($request->hasFile('image_profile1')) {
            $image = $request->file('image_profile1');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/admins/$file_name");
            $item->id_image = $file_name;
        }
        

        if($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/admins/$file_name");
            $item->image = $file_name;
        }

        $item->save();


        return redirect()->route('admin.employees.index')->with('status', __('cp.update'));
    }






    public function edit_password(Request $request, $id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.employees.edit_password',['item' => $item]);
    }




    public function update_password(Request $request, $id)
    {
        $users_rules=array(
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }
        $user = Admin::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('admin.employees.index')->with('status', __('cp.update'));
    }



    public function destroy($id)
    {
        $item = Admin::query()->findOrFail($id);
        if ($item) {
            Admin::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
