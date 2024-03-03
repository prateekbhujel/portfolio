<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/protfolio-details', function () {
    return view('frontend.protfolio-details');
}); 

/** Admin Profile Routes**/
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});//End Admin Profile Routes

require __DIR__.'/auth.php';

/** Admin Resoruce Routes. **/
Route::group(['middlware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
    Route::resource('services', ServiceController::class);

});//End Admin Resource Routes