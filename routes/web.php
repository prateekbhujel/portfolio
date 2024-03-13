<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperinceController;
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

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});


Route::get('portfolio-details/{portfolioItem}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');

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

    /**  Protfolio Item Route for Protfolio Section **/
    Route::resource('protfolio-item', ProtfolioItemController::class)->except(['show']);

    /**  Protfolio Section Setting Route for Protfolio Section **/
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class)->only(['index','update']);
    
    /**  Skill Section Setting Route **/
    Route::resource('skill-section-setting', SkillSectionSettingController::class)->only(['index','update']);

    /**  Skill Section Setting Route **/
    Route::resource('skill-section-item', SkillItemController::class)->except(['show']);

    
    /**  Experince Section Setting Route **/
    Route::resource('experience', ExperinceController::class)->only(['index','update']);

});//End Admin Resource Routes