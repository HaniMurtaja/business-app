<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;


class SettingController extends Controller
{

    private $locales = '';


    public function __construct()
    {
        $this->locales = Language::all();
        view()->share(['locales' => $this->locales]);
    }



    public function index()
    {
        $item = Setting::query()->first();
        return view('admin.settings.edit', ['item' => $item]);
    }



    public function update(Request $request)
    {

        $locales = Language::all()->pluck('lang');
        $roles = [
            'url' => 'nullable|url',
            'info_email' => 'required|email',
            'mobile' => 'nullable|numeric',
            'phone' => 'nullable|numeric',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linked_in' => 'nullable|url',
            'instagram' => 'nullable|url',
        ];

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['address_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        
        $setting = Setting::query()->findOrFail(1);
        
        $counter_time =  date('Y/m/d h:i:s', strtotime($request->counter_time));
        // return $counter_time;
        

        $setting->url = trim($request->get('url'));
        $setting->info_email = trim($request->get('info_email'));
        $setting->app_store_url = trim($request->get('app_store_url'));
        $setting->play_store_url = trim($request->get('play_store_url'));
        $setting->mobile = trim($request->get('mobile'));
        $setting->phone = trim($request->get('phone'));
        $setting->whatsapp = trim($request->get('whatsapp'));
        $setting->facebook = trim($request->get('facebook'));
        $setting->twitter = trim($request->get('twitter'));
        $setting->linked_in = trim($request->get('linked_in'));
        $setting->instagram = trim($request->get('instagram'));
        // $setting->counter_time = $counter_time;
        // $setting->counter_yes_no = trim($request->get('counter_yes_no'));
        // $setting->delivery_cost_by_meter = trim($request->get('delivery_cost_by_meter'));

        $setting->latitude = trim($request->get('latitude'));
        $setting->longitude = trim($request->get('longitude'));

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("uploads/settings/$file_name");
            $setting->logo = $file_name;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
           /* Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("uploads/settings/$file_name");*/
            
            $image->move("uploads/settings/", $file_name);
            
            $setting->image = $file_name;
        }

        foreach ($locales as $locale) {
            $setting->translate($locale)->title = trim(ucwords($request->get('title_' . $locale)));
            $setting->translate($locale)->address = trim(ucwords($request->get('address_' . $locale)));
            $setting->translate($locale)->description = ucwords($request->get('description_' . $locale));
        }

        $setting->save();
        return redirect()->route('admin.settings.all')->with('status', __('cp.update'));
    }
}
