<?php
namespace App\Http\Controllers\WEB\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use App\User;
use App\Models\Language;
use App\Models\Category;
use App\Models\ProductImage;

use App\Models\ProductTranslation;
use App\Models\Setting;
use App\Models\Ad;

use App\Models\Page;
use App\Models\Team;
use App\Models\Partner;
use App\Models\Magazine;
use App\Models\Event;
use App\Models\Article;
use App\Models\Photo;

use Carbon\Carbon;

use Twilio;
use QrCode;
use Image;


class FrontController extends Controller
{

    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }

    
    public function index()
    {
        $articles = Article::active()->latest('id')->take(6)->get();
        $ourPartners = Partner::active()->get();
        $events = Event::active()->latest('id')->take(6)->get();
        $latestPhotos = Photo::where('attachmentable_type', 'App\Models\Gallery')->latest('id')->take(6)->get();

        return view('website.home', ['articles' => $articles, 'ourPartners' => $ourPartners, 'events' => $events, 'latestPhotos' => $latestPhotos]);
    }
    
    
    public function shop()
    {
        return view('website.pages.shop');
    }
    
    
    public function events()
    {
        $events = Event::active()->latest('id')->get();
        return view('website.pages.events', ['events' => $events]);
    }
    
    
    public function eventDetails($id)
    {
        $event = Event::findOrFail($id);
        return view('website.pages.eventDetails', ['event' => $event]);
    }
    
    
    public function articleDetails($id)
    {
        $article = Article::findOrFail($id);
        return view('website.pages.articleDetails', ['article' => $article]);
    }
    
    
    
    public function magazines()
    {
        $magazines = Magazine::active()->latest('id')->get();
        return view('website.pages.magazines', ['magazines' => $magazines]);
    }
    
    
    public function galleries()
    {
        return view('website.pages.galleries');
    }
    
    
    public function aboutUs()
    {
        $aboutUs = Page::where('id', 1)->first();
        $ourTeam = Team::active()->get();
        $ourPartners = Partner::active()->get();
        return view('website.pages.aboutUs', ['aboutUs' => $aboutUs, 'ourTeam' => $ourTeam, 'ourPartners' => $ourPartners]);
    }
    

    public function contactUs()
    {
        return view('website.pages.contactUs');
    }
    
    

   
}
