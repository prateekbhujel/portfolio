<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperinceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUseFulLinkController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProtfolioItemController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/** Fornt-End All Routes **/
Route::get('/', [HomeController::class, 'index'])->name('home');

/** Portfolio Details route**/
Route::get('portfolio-details/{portfolioItem}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');

/** Blog Details route**/
Route::get('blog-details/{blogDetail}', [HomeController::class, 'showBlogDetail'])->name('show.blog.detail');

/** Blog grid lists Route **/
Route::get('blog', [HomeController::class, 'blog'])->name('blog');

/** Contact Route **/
Route::post('contact', [HomeController::class, 'contact'])->name('contact');

/** End Fornt-End All Routes **/

/** Admin Profile Routes**/
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});//End Admin Profile Routes

require __DIR__.'/auth.php';

/** Admin Resoruce Routes. **/
Route::group(['middlware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function()
{
    /** Hero Section Route**/
    Route::resource('hero', HeroController::class)->except(['show', 'store', 'destroy', 'edit']);
    Route::resource('typer-title', TyperTitleController::class)->except(['show']);

    /** Services Section Route**/
    Route::resource('services', ServiceController::class)->except(['show']);

    /** About Section Download Resume Route**/
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    /** About Section Route**/
    Route::resource('about', AboutController::class)->except(['show', 'edit', 'store', 'destroy']);

    /** Category Route for Protfolio Section **/
    Route::resource('category', CategoryController::class)->except(['show']);

    /**  Protfolio Section Route **/
    Route::resource('protfolio-item', ProtfolioItemController::class)->except(['show']);
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class)->only(['index','update']);
    
    /**  Skill Section Route **/
    Route::resource('skill-section-setting', SkillSectionSettingController::class)->only(['index','update']);
    Route::resource('skill-section-item', SkillItemController::class)->except(['show']);

    
    /**  Experince Section Route **/
    Route::resource('experience', ExperinceController::class)->only(['index','update']);
    
    /**  Feedback Section Route **/
    Route::resource('feedback', FeedbackController::class)->except(['show']);
    /** Feedback Section Setting Route **/
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class)->only(['index','update']);

    /** Blog Sections **/
    /** Catgeory Route **/
    Route::resource('blog-category', BlogCategoryController::class)->except('show');
    /** Blogs Route **/
    Route::resource('blog', BlogController::class)->except('show');
    /** Blog Section Setting Route **/
    Route::resource('blog-section-setting', BlogSectionSettingController::class)->only(['index', 'update']);

    /** Contact Section Route **/
    /** Contact Section Setting Route **/
    Route::resource('contact-section-setting', ContactSectionSettingController::class)->only(['index','update']);
    
    /** Footer Sections All Routes **/
    /** Social Routes **/
    Route::resource('footer-social', FooterSocialLinkController::class)->except(['show']);
    /** Information of footer (Footer details) **/
    Route::resource('footer-info', FooterInfoController::class )->only(['index', 'update']);
    /** Contact Information of footer section **/
    Route::resource('footer-contact-info', FooterContactInfoController::class)->only(['index', 'update']);
    /** Userful links routes **/
    Route::resource('footer-useful-links', FooterUseFulLinkController::class)->except('show');
    /** Help Links routes **/
    Route::resource('footer-help-links', FooterHelpLinkController::class)->except('show');

});//End Admin Resource Routes