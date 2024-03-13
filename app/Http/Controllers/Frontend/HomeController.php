<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Service;
use App\Models\TyperTitle;
use App\Models\About;
use App\Models\Category;
use App\Models\Experince;
use App\Models\PortfolioSectionSetting as Setting;
use App\Models\ProtfolioItem;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {  
        $hero                = Hero::first();
        $typer_titles        = TyperTitle::all();
        $services            = Service::all();
        $about               = About::first();
        $portfolioTitle      = Setting::first();
        $portfolioCategories = Category::all();
        $portfolioItems      = ProtfolioItem::all();
        $skill               = SkillSectionSetting::first();
        $skillItems          = SkillItem::all();
        $experience          = Experince::first();
        
       return view('frontend.home', 
              compact(
                    'hero', 
                    'typer_titles', 
                    'services', 
                    'about', 
                    'portfolioTitle',
                    'portfolioCategories',
                    'portfolioItems',
                    'skill',
                    'skillItems',
                    'experience'
                ));

    }//End Method
    

    public function showPortfolio(ProtfolioItem $portfolioItem)
    {
        return view('frontend.protfolio-details', compact('portfolioItem'));

    }//End Method

}
