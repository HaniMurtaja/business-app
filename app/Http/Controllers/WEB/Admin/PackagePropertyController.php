<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Language;

use App\User;

use App\Models\Setting;
use App\Models\Package;
use App\Models\PackageProperty;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;


class PackagePropertyController extends Controller
{

  
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }
    
    
    
    public function index(Request $request)
    {
        $items = PackageProperty::query();
        $items = $items->orderBy('package_id', 'desc')->paginate(20);
        return view('admin.packages_properties.home', ['items' => $items]);
    }
    

   
    public function create()
    {
        $packages = Package::active()->get();
        return view('admin.packages_properties.create', ['packages' =>$packages]);
    }

  
  
  
    public function store(Request $request)
    {
        
        $roles = [
            'package_id' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        
        $item = new PackageProperty(); 
        $item->package_id = $request->package_id;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }

        $item->save();
        
        return redirect()->route('admin.packages_properties.index')->with('status', __('cp.create'));
    }


  
  
    public function edit($id)
    {
        $item = PackageProperty::findOrFail($id);
        $packages = Package::active()->get();
        return view('admin.packages_properties.edit', ['product' => $item, 'packages' =>$packages]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
            'package_id' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);


        $item = PackageProperty::query()->findOrFail($id);
        $item->package_id = $request->package_id;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }

        $item->save();
        
        return redirect()->route('admin.packages_properties.index')->with('status', __('cp.update'));
    }




    public function destroy($id)
    {
        $item = PackageProperty::query()->findOrFail($id);
        if ($item) {
            PackageProperty::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }
    

    

}
