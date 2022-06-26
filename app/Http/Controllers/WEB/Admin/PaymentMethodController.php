<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\PaymentMethod;
use App\Models\Language;
use App\Models\Setting;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Image;

class PaymentMethodController extends Controller
{
    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }



    public function index()
    {
       $items  = PaymentMethod::latest()->paginate(20);       
       return view('admin.payments_methods.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.payments_methods.create');
    }



    public function store(Request $request)
    {

        $locales = Language::all()->pluck('lang');

        $item = new PaymentMethod();
        
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/payments_methods/".$file_name);
            $item->image = $file_name;
        }

        $item->save();
        return redirect()->route('admin.payments_methods.index')->with('status', __('translate.create'));

    }


 


    public function edit($id)
    {
        $item = PaymentMethod::findOrFail($id);
        return view('admin.payments_methods.edit', ['item' => $item]);
    }



    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

        $item = PaymentMethod::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/payments_methods/".$file_name);
            $item->image = $file_name;
        }
        
        $item->save();
        return redirect()->route('admin.payments_methods.index')->with('status', __('translate.update'));

    }


    public function show($id)
    {
        $item = PaymentMethod::findOrFail($id);
        return view('admin.payments_methods.show', ['item' => $item]);
    }


    public function destroy($id)
    {
        $item = PaymentMethod::query()->findOrFail($id);
        if ($item) {
            PaymentMethod::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

}
