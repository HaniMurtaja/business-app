<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Language;

use App\User;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Service;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;


class ServiceController extends Controller
{

  
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }
    
    
    
    public function index(Request $request)
    {
        // $items = Service::query();
        // $items = $items->latest()->paginate(20);
        
        $items = Category::active()->get();
        
        return view('admin.services.home', ['items' => $items]);
    }
    

   
    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.services.create', ['categories' => $categories]);
    }

  
  
  
    public function store(Request $request)
    {
        
        $roles = [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        
        $item = new Service(); 
        $item->type = $request->type;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->offer_price = $request->offer_price;
        $item->points_count = $request->points_count;
        $item->estimated_time = $request->estimated_time;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . '.jpg';
            Image::make($image)->save("uploads/services/$file_name");
            $item->image = $file_name;
        }

        $item->save();
        
        return redirect()->route('admin.services.index')->with('status', __('cp.create'));
    }


  


    public function show($id)
    {
        $item = Service::findOrFail($id);
        return view('admin.services.show', ['item' => $item]);
    }

  
  
  
    public function edit($id)
    {
        $item = Service::findOrFail($id);
        $categories = Category::active()->get();

        return view('admin.services.edit', ['product' => $item, 'categories' => $categories]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);


        $item = Service::query()->findOrFail($id);
        
        $item->category_id = $request->category_id;
        $item->estimated_time = $request->estimated_time;

        
        $item->type = $request->type;
        
        if($request->type == 'fixed_price'){
            $item->price = $request->price;
            $item->offer_price = $request->offer_price;            
            $item->points_count = null;
        }
        
        elseif($request->type == 'points'){
            $item->price = null;
            $item->offer_price = null;
            $item->points_count = $request->points_count;
        }else{
            $item->price = null;
            $item->offer_price = null;
            $item->points_count = null;
        }
        


        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . '.jpg';
            Image::make($image)->save("uploads/services/$file_name");
            $item->image = $file_name;
        }

        $item->save();
        
        return redirect()->route('admin.services.index')->with('status', __('cp.update'));
    }




    public function destroy($id)
    {
        $item = Service::query()->findOrFail($id);
        if ($item) {
            Service::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }
    

    

}
