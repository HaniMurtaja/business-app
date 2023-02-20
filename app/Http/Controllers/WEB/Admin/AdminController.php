<?php

namespace App\Http\Controllers\WEB\Admin;


use App\Admin;
use App\User;

use App\Models\City;
use App\Models\Permission;
use App\Models\Setting;
use App\Models\UserPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        $items = Admin::query();
        if ($request->has('email')) {
            if ($request->get('email') != null)
                $items->where('email', 'like', '%' . $request->get('email') . '%');
        }

        if ($request->has('mobile')) {
            if ($request->get('mobile') != null)
                $items->where('mobile', 'like', '%' . $request->get('mobile') . '%');
        }


        $items = $items->where('id', '>',1)->where('type', '<>', 'department_employee')->orderBy('id', 'desc');
        
        if(auth()->guard('admin')->user()->type == 'admin'){
            return view('admin.admin.home', ['items' => $items->get()]);
        }
        else{
            return redirect()->route('admin.admin.home');
        }

        
        

    }


    public function create()
    {
        $users = Admin::all();
        $role=Permission::where('id','>',0)->get();
        $drivers = User::where('type', 'driver')->get();
        return view('admin.admin.create', ['users' => $users, 'role' => $role, 'drivers' => $drivers]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6',
            'mobile'=>'required|digits_between:8,12',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $orderSelected = array_search('orders', $request->permissions); 

        $newAdmin = new Admin();
        $newAdmin->name=$request->name;
        $newAdmin->email=$request->email;
        $newAdmin->password=bcrypt($request->password);
        $newAdmin->mobile=$request->mobile;
        
        if($orderSelected >= 0){
            $newAdmin->driver_id_orders = $request->driver_id;    
        }else{
            $newAdmin->driver_id_orders = 0;    
        }

        $newAdmin->save();
        
        $roles = '';
        if ($request->permissions) {
            $arr = [];
            foreach ($request->permissions as $permission) {
                $roles .= $permission . ',';
            }
            UserPermission::create([
                'user_id' => $newAdmin->id,
                'permission' => substr($roles, 0, -1)
            ]);
        }

        return redirect()->route('admin.admins.all')->with('status', __('cp.create'));

    }



    public function edit($id)
    {

        $item = Admin::findOrFail($id);
        $role=Permission::where('id','>',0)->get();
        $userRole=UserPermission::where('user_id',$item->id)->first();

        $userRoleItem=[];
        if($userRole)
        {
            $userRoleItem=explode(',',$userRole->permission);
        }
        
        $drivers = User::where('type', 'driver')->get();

        return view('admin.admin.edit', ['item' => $item, 'role' => $role ,'userRoleItem' => $userRoleItem, 'drivers' => $drivers]);
    }


    public function update(Request $request, $id)
    {

        $newAdmin= Admin::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
            'mobile'=>'required|digits_between:8,12|unique:admins,mobile,'.$newAdmin->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $check = Admin::where('email',$request->email)->where('id','<>',$id)->first();
        if($check){
            $validator=[__('api.whoops')];
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $orderSelected = [];
        if(isset($request->permissions)){
            $orderSelected = array_search('orders', $request->permissions);     
        }
        
        
        $newAdmin->name = $request->name;
        $newAdmin->mobile = $request->mobile;
        $newAdmin->save();
        
        $roles = '';
        if ($request->permissions) {
            $arr = [];
            foreach ($request->permissions as $permission) {
                $roles .= $permission . ',';
            }

            $userPermission = UserPermission::where('user_id', $id)->first();

            if ($userPermission)
                $userPermission->delete();

            UserPermission::create([
                'user_id' => $id,
                'permission' => substr($roles, 0, -1)
            ]);
        }

        return redirect()->route('admin.admins.all')->with('status', __('cp.update'));

    }



    public function edit_password(Request $request, $id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.admin.edit_password',['item'=>$item]);
    }


    public function update_password (Request $request, $id)
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
        
        if(auth()->guard('admin')->user()->type == 'admin'){
            return redirect()->route('admin.admins.all')->with('status', __('cp.update'));
        }
        else{
            return redirect()->back()->with('status', __('cp.update'));
        }

    }


    public function destroy($id)
    {
        $item = Admin::query()->findOrFail($id);
        if ($item && $item->type != 1) {
            Admin::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
