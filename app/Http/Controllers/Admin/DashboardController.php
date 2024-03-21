<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\ProtfolioItem;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $blogCount = Blog::count();
        $skillCount = SkillItem::count();
        $portfolioCount = ProtfolioItem::count();
        $feedbackCount = Feedback::count();
        
       return view('admin.dashboard', compact('blogCount', 'skillCount', 'portfolioCount', 'feedbackCount')); 
    
    }//End Method

    
}
