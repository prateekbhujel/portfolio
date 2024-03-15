<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Service;
use App\Models\TyperTitle;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Experince;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
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
        $feedbacks           = Feedback::all();
        $feedbackTitle       = FeedbackSectionSetting::first();
        $blogs               = Blog::latest()->take(5)->get();
        
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
                    'experience',
                    'feedbacks',
                    'feedbackTitle',
                    'blogs',
                ));

    }//End Method
    

    public function showPortfolio(ProtfolioItem $portfolioItem)
    {
        return view('frontend.protfolio-details', compact('portfolioItem'));

    }//End Method

    public function showBlogDetail(Blog $blogDetail)
    {  
        $previousPost = Blog::where('id', '<', $blogDetail->id)->orderBy('id', 'desc')->first();
        $nextPost     = Blog::where('id', '>', $blogDetail->id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('blogDetail', 'previousPost', 'nextPost'));

    }//End Method


    /**
     * This function returns the blogs and shows them in lsists: grids
    */
    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog', compact('blogs'));
    }//End Method

}
