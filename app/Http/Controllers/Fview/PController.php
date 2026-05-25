<?php

namespace App\Http\Controllers\Fview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Projects;
use App\Models\Members;
use App\Models\Testimonials;
use App\Models\Contacts;
use App\Models\Hero;
use App\Models\Statistic;
use App\Models\About;
use App\Models\Transparency;
use App\Models\LocationSetting;


 // هنا احنا بنستعمل الـ Model
class PController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $projects = Projects::latest()->get();
        $news = News::orderBy('published_at', 'desc')->orderBy('created_at', 'desc')->get();
        $members = Members::all();
        $testimonials = Testimonials::all();
        $contacts = Contacts::all();
        $contact = Contacts::latest()->first() ?? new Contacts(); // Fetch newest contact, or empty model
        $hero = Hero::first();
        $statistic = Statistic::first();
        $about = About::first();
        $transparency = Transparency::first();
        $locationSettings = LocationSetting::all();
        $teamSetting = \App\Models\TeamSetting::first();
        return view('inde', compact('projects', 'news', 'members', 'testimonials', 'contacts', 'contact', 'hero', 'statistic', 'about', 'transparency', 'locationSettings', 'teamSetting'));
    }
     public function show($id)
    {
        $project = Projects::findOrFail($id); // جلب المشروع حسب id
        $statistic = Statistic::first();
        $contact = Contacts::latest()->first() ?? new Contacts();
        $siteHero = Hero::first();
        return view('Protection', compact('project', 'statistic', 'contact', 'siteHero'));
    }
    public function Nshow($id)
    {
        $News = News::findOrFail($id); // جلب المشروع حسب id
        $statistic = Statistic::first();
        $contact = Contacts::latest()->first() ?? new Contacts();
        $siteHero = Hero::first();
        return view('displayNew', compact('News', 'statistic', 'contact', 'siteHero'));
    }

    public function profile()
    {
        $about = About::first();
        $statistic = Statistic::first();
        $contact = Contacts::latest()->first() ?? new Contacts();
        $siteHero = Hero::first();
        $locationSettings = LocationSetting::all();
        $teamSetting = \App\Models\TeamSetting::first();
        
        $profileSetting = \App\Models\ProfileSetting::first() ?? new \App\Models\ProfileSetting();
        $profileItems = \App\Models\ProfileItem::orderBy('sort_order', 'asc')->get()->groupBy('type');
        
        return view('profile', compact('about', 'statistic', 'contact', 'siteHero', 'locationSettings', 'teamSetting', 'profileSetting', 'profileItems'));
    }
}
