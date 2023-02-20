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
