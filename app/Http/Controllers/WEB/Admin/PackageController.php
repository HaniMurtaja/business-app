<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Language;

use App\User;

use App\Models\Setting;
use App\Models\Package;
use App\Models\Service;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;


class PackageController extends Controller
{

  
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }
    
    
    
    public function index(Request $request)
    {
        $items = Package::query();
        $items = $items->latest()->paginate(20);
        return view('admin.packages.home', ['items' => $items]);
    }
    

   
    public function create()
    {
        return view('admin.packages.create');
    }

  
  
  
    public function store(Request $request)
    {
        
        $roles = [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'price' => 'required',
            'months_count' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        
        $item = new Package(); 
        $item->price = $request->price;
        $item->months_count = $request->months_count;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = "attach" . time() . "_" . rand(1, 50000) . 'file.' . $extension;
            $destinationPath = 'uploads/packages';
            $file->move($destinationPath, $filename);
            $item->file = $filename;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . '.jpg';
            Image::make($image)->save("uploads/packages/$file_name");
            $item->image = $file_name;
        }

        $item->save();
        
        return redirect()->route('admin.packages.index')->with('status', __('cp.create'));
    }


  


    public function show($id)
    {
        $item = Package::findOrFail($id);
        return view('admin.packages.show', ['item' => $item]);
    }

  
  
  
    public function edit($id)
    {
        $item = Package::findOrFail($id);
        return view('admin.packages.edit', ['product' => $item]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'price' => 'required',
            'months_count' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);


        $item = Package::query()->findOrFail($id);
        $item->price = $request->price;
        $item->months_count = $request->months_count;
        
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = "attach" . time() . "_" . rand(1, 50000) . 'file.' . $extension;
            $destinationPath = 'uploads/packages';
            $file->move($destinationPath, $filename);
            $item->file = $filename;
        }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . '.jpg';
            Image::make($image)->save("uploads/packages/$file_name");
            $item->image = $file_name;
        }

        $item->save();
        
        return redirect()->route('admin.packages.index')->with('status', __('cp.update'));
    }




    public function destroy($id)
    {
        $item = Package::query()->findOrFail($id);
        if ($item) {
            Package::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }
    

    

}
