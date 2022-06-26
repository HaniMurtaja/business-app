<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Faq;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Image;

class FaqController extends Controller
{
    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
        ]);
    }



    public function index()
    {
       $items  = Faq::orderBy('ordered', 'asc')->paginate(20);       
       return view('admin.faqs.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.faqs.create');
    }



    public function store(Request $request)
    {
        
        $locales = Language::all()->pluck('lang');

        $item = new Faq();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->question = $request->get('question_' . $locale);
            $item->translateOrNew($locale)->answer = $request->get('answer_' . $locale);
        }
        $item->save();

        return redirect()->route('admin.faqs.index')->with('status', __('translate.create'));

    }


    public function show($id)
    {
        $item = Faq::all();
    }
    

    public function reorderedFaqs(Request $request)
    {
        foreach ($request->cats as $key => $value){
            Faq::query()->where('id', $value)->update(['ordered' => $request->ordered[$key]]);
        }
        return redirect()->route('admin.faqs.index')->with('status', __('translate.update'));
    }



    public function edit($id)
    {
        $item = Faq::findOrFail($id);
        return view('admin.faqs.edit', ['item' => $item]);
    }



    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');
        $item = Faq::query()->findOrFail($id);
                
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->question = $request->get('question_' . $locale);
            $item->translateOrNew($locale)->answer = $request->get('answer_' . $locale);
        }
        $item->save();

        return redirect()->route('admin.faqs.index')->with('status', __('translate.update'));

    }


    public function destroy($id)
    {
        $item = Faq::query()->findOrFail($id);
        if ($item) {
            Faq::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

}
