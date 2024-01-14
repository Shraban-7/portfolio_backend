<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HeroController;

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PersonalInfoController;
use App\Http\Controllers\Api\FrontendController;

Route::get('/', function () {
    return view('welcome');
})->name('main');


Route::get('cv/{user_name}',[FrontendController::class,'main'] )->name('home');


Route::post('contact/',[ContactController::class,'contact'])->name('contact.save');


Route::get('/dashboard', function () {


    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Route::resource('Service',ServiceController::class);

    //service

    Route::get('service/manage/',[ServiceController::class,'index'])->name('service.manage');
    Route::post('service/store/',[ServiceController::class,'store'])->name('service.store');
    Route::get('service/status/{service}',[ServiceController::class,'is_active'])->name('service.status');
    Route::get('service/edit/{service}',[ServiceController::class,'edit'])->name('service.edit');
    Route::post('service/update/{service}',[ServiceController::class,'update'])->name('service.update');
    Route::get('service/delete/{service}',[ServiceController::class,'destroy'])->name('service.delete');

    // Skill
    Route::get('skill/manage/',[SkillController::class,'index'])->name('skill.manage');
    Route::post('skill/store/',[SkillController::class,'store'])->name('skill.store');
    Route::get('skill/edit/{service}',[SkillController::class,'edit'])->name('skill.edit');
    Route::post('skill/update/{service}',[SkillController::class,'update'])->name('skill.update');
    Route::get('skill/delete/{service}',[SkillController::class,'destroy'])->name('skill.delete');
    // portfolio
    Route::get('portfolio/manage/',[PortfolioController::class,'index'])->name('portfolio.manage');
    Route::post('portfolio/store/',[PortfolioController::class,'store'])->name('portfolio.store');
    Route::get('portfolio/status/{portfolio}',[PortfolioController::class,'is_active'])->name('portfolio.status');
    Route::get('portfolio/edit/{portfolio}',[PortfolioController::class,'edit'])->name('portfolio.edit');
    Route::post('portfolio/update/{portfolio}',[PortfolioController::class,'update'])->name('portfolio.update');
    Route::get('portfolio/delete/{portfolio}',[PortfolioController::class,'destroy'])->name('portfolio.delete');
    // hero
    Route::get('hero/manage/',[HeroController::class,'index'])->name('hero.manage');
    Route::post('hero/store/',[HeroController::class,'store'])->name('hero.store');
    Route::get('hero/data',[HeroController::class,'edit'])->name('hero.edit');
    Route::post('hero/update',[HeroController::class,'update'])->name('hero.update');
    Route::get('hero/delete/{hero}',[HeroController::class,'destroy'])->name('hero.delete');
    // about
    Route::get('about/manage/',[AboutController::class,'index'])->name('about.manage');
    Route::post('about/store/',[AboutController::class,'store'])->name('about.store');
    Route::get('about/data',[AboutController::class,'edit'])->name('about.edit');
    Route::post('about/update',[AboutController::class,'update'])->name('about.update');
    Route::get('about/delete/{about}',[AboutController::class,'destroy'])->name('about.delete');
    // counter
    Route::get('counter/manage/',[CounterController::class,'index'])->name('counter.manage');
    Route::post('counter/store/',[CounterController::class,'store'])->name('counter.store');
    Route::get('counter/edit/{counter}',[CounterController::class,'edit'])->name('counter.edit');
    Route::post('counter/update/{counter}',[CounterController::class,'update'])->name('counter.update');
    Route::get('counter/delete/{counter}',[CounterController::class,'destroy'])->name('counter.delete');

    // personal info
    Route::get('personal_info/create/',[PersonalInfoController::class,'create'])->name('personal_info.create');
    Route::post('personal_info/store/',[PersonalInfoController::class,'store'])->name('personal_info.store');
    Route::get('personal_info/edit',[PersonalInfoController::class,'edit'])->name('personal_info.edit');
    Route::post('personal_info/update',[PersonalInfoController::class,'update'])->name('personal_info.update');

     // testimonial
     Route::get('testimonial/manage/',[TestimonialController::class,'index'])->name('testimonial.manage');
     Route::post('testimonial/store/',[TestimonialController::class,'store'])->name('testimonial.store');
     Route::get('testimonial/edit/{testimonial}',[TestimonialController::class,'edit'])->name('testimonial.edit');
     Route::post('testimonial/update/{testimonial}',[TestimonialController::class,'update'])->name('testimonial.update');
     Route::get('testimonial/delete/{testimonial}',[TestimonialController::class,'destroy'])->name('testimonial.delete');

     // social_icon
     Route::get('social_icon/manage/',[SocialIconController::class,'index'])->name('social_icon.manage');
     Route::post('social_icon/store/',[SocialIconController::class,'store'])->name('social_icon.store');
     Route::get('social_icon/edit/{social_icon}',[SocialIconController::class,'edit'])->name('social_icon.edit');
     Route::post('social_icon/update/{social_icon}',[SocialIconController::class,'update'])->name('social_icon.update');
     Route::get('social_icon/delete/{social_icon}',[SocialIconController::class,'destroy'])->name('social_icon.delete');

     //contact


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
