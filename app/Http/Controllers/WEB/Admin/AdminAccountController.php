<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Admin;

use App\Models\Order;
use App\Models\Setting;
use App\Models\UserReward;



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


class AdminAccountController extends Controller
{


    public function __construct()
    {
        $this->settings = Setting::query()->first();
        view()->share(['settings' => $this->settings]);
    }



    public function index(Request $request)
    {
        $items = User::query();
        if ($request->has('email')) {
            if ($request->get('email') != null)
                $items->where('email', 'like', '%' . $request->get('email') . '%');
        }

        if ($request->has('mobile')) {
            if ($request->get('mobile') != null)
                $items->where('mobile', 'like', '%' . $request->get('mobile') . '%');
        }
  
        $items = $items->where('type', 'admin_account')->latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.admins_accounts.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.admins_accounts.create');
    }




    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users|digits_between:8,16',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $item = new User();
        $item->name = $request->name;
        $item->license = $request->license;
        $item->mobile = $request->mobile;
        $item->address = $request->address;
        $item->password = bcrypt($request->password);
        $item->latitude = $request->lat;
        $item->longitude = $request->lng;
        $item->status = 'active';
        $item->type = 'admin_account';

        if($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/users/$file_name");
            $item->image_profile = $file_name;
        }

        $item->save();
        return redirect()->route('admin.admins_accounts.index')->with('status', __('cp.create'));
    }



    public function edit($id)
    {

        $item = User::findOrFail($id);
        return view('admin.admins_accounts.edit',['item' => $item]);
    }


    public function show($id)
    {
        $item = User::findOrFail($id);
        return view('admin.admins_accounts.show',['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits_between:8,116|unique:users,mobile,'.$item->id,
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->name = $request->name;
        $item->license = $request->license;
        $item->mobile = $request->mobile;
        $item->address = $request->address;

        if($request->lat){
            $item->latitude = $request->lat;
        }

        if($request->lng){
            $item->longitude = $request->lng;
        }

        if($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/users/$file_name");
            $item->image_profile = $file_name;
        }

        $item->save();


        return redirect()->route('admin.admins_accounts.index')->with('status', __('cp.update'));
    }






    public function edit_password(Request $request, $id)
    {
        $item = User::findOrFail($id);
        return view('admin.admins_accounts.edit_password',['item' => $item]);
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
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('admin.admins_accounts.index')->with('status', __('cp.update'));
    }



    public function destroy($id)
    {
        $item = User::query()->findOrFail($id);
        if ($item) {
            User::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
