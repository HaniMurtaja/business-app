<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Article;
use App\Models\Language;
use App\Models\Setting;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;

class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales,'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = Article::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.articles.home', ['items' => $items]);
    }


    public function show($id)
    {
        $item = Article::findOrFail($id);
        return view('admin.articles.show',['item' => $item]);
    }


    // public function create()
    // {
    //     return view('admin.ads.create');
    // }


    // public function store(Request $request)
    // {
    //     $roles = [
    //         'logo' => 'nullable|image|mimes:jpeg,jpg,png',
    //     ];

    //     $locales = Language::all()->pluck('lang');
        
    //     foreach ($locales as $locale) {
    //         $roles['name_' . $locale] = 'required';
    //     }

        
    //     $this->validate($request, $roles);

    //     $ad = new Ad();
    //     // $ad->type = $request->type;
    //     $ad->url = $request->url;
    //     $ad->image_video = $request->image_video;
    //     // $ad->video_url = $request->video_url;

        
    //     if(isset($request->file)){
    //         $file = $request->file;
    //         $extension = $file->getClientOriginalExtension();
    //         $filename  = rand(1, 1000) . "_" . time() . "_" . rand(1,50000) . 'book.' .$extension;
    //         $destinationPath = 'uploads/ads/';
    //         $file->move($destinationPath,$filename);
    //         $ad->video_url = $filename;
    //     }

    //     if ($request->hasFile('logo') && $request->image_video == 'image') {
    //         $logo = $request->file('logo');
    //         $extention = $logo->getClientOriginalExtension();
    //         $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
    //         Image::make($logo)->save("uploads/ads/".$file_name);
    //         $ad->image = $file_name;
    //     }
        
    //     foreach ($locales as $locale)
    //     {
    //         $ad->translateOrNew($locale)->name = $request->get('name_' . $locale);
    //         $ad->translateOrNew($locale)->details = $request->get('details_' . $locale);
    //     }

    //     $ad->save();
    //     return redirect()->route('admin.ads.index')->with('status', __('cp.create'));

    // }


    // public function edit($id)
    // {
    //     $item = Article::findOrFail($id);
    //     return view('admin.ads.edit', ['item' => $item]);
    // }



    // public function update(Request $request, $id)
    // {

    //     $locales = Language::all()->pluck('lang');
        
    //     foreach ($locales as $locale) {
    //         $roles['name_' . $locale] = 'required';
    //     }
        
    //     $this->validate($request, $roles);

    //     $item = Ad::query()->findOrFail($id);

    //     foreach ($locales as $locale)
    //     {
    //         $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
    //         $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
    //     }     

    //     $item->url = $request->url;
    //     $item->image_video = $request->image_video;
    //     // $item->video_url = $request->video_url;

    //     if(isset($request->file)){
    //         $file = $request->file;
    //         $extension = $file->getClientOriginalExtension();
    //         $filename  = rand(1, 1000) . "_" . time() . "_" . rand(1,50000) . 'book.' .$extension;
    //         $destinationPath = 'uploads/ads/';
    //         $file->move($destinationPath,$filename);
    //         $item->video_url = $filename;
    //     }

    //     if ($request->hasFile('image') && $request->image_video == 'image') {
    //         $image = $request->file('image');
    //         $extention = $image->getClientOriginalExtension();
    //         $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
    //         Image::make($image)->save("uploads/ads/".$file_name);
    //         $item->image = $file_name;
    //     }

    //     $item->save();

    //     return redirect()->route('admin.ads.index')->with('status', __('cp.update'));

    // }


    public function destroy($id)
    {
        $item = Article::query()->findOrFail($id);
        if ($item) {
            Article::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

}
