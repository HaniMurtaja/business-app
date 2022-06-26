<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Input;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;



class PagesController extends Controller
{
    public function __construct()
    {
        view()->share([
            'locales' => Language::all(),
            'setting' => Setting::query()->first(),
        ]);
    }


    public function image_extensions(){
        return array('jpg','png','jpeg','gif','bmp');
    }



    
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.home', ['pages' => $pages]);
    }

  
  
    public function create()
    {
        return view('admin.pages.create');
    }

  
  
 


    public function edit($id)
    {
        $item = Page::query()->findOrFail($id);
        return view('admin.pages.edit', ['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $page = Page::query()->findOrFail($id);
        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $page->translate($locale)->title = ucwords($request->get('title_' . $locale));
            $page->translate($locale)->description = $request->get('description_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("uploads/pages/$file_name");
            $page->image = $file_name;
        }
        
        $page->save();

        return redirect()->route('admin.pages.index')->with('status', __('cp.update'));
        
    }






}
