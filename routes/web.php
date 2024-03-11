<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TermsConditionsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  //  return view('auth.course');
  return redirect()->route('auth.register_view');
});


Route::get('/about-us',[AboutController::class , 'index'])
->name('about.index');


Route::get('/contact-us',[ContactController::class , 'index'])
->name('contact.index');

// Route::get('/course',[CourseController::class , 'index'])
// ->name('course.index');

Route::get('login',[AuthController::class , 'index'])
 ->name('login');

 Route::post('login',[AuthController::class , 'login'])
 ->name('auth.login');

 

 Route::get('register',[AuthController::class , 'register_view'])
 ->name('auth.register_view');

 Route::post('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::get('/faq',[FaqController::class , 'index'])
->name('faq.index');

Route::get('/refund-policy',[RefundController::class , 'index'])
->name('refund.index');

Route::get('/privacy-policy',[PrivacyController::class , 'index'])
->name('privacy.index');


Route::get('/how-it-works',[HowItWorksController::class , 'index'])
->name('works.index');

Route::group(['middleware'=>'auth:student'],function(){

Route::get('dashboard',[DashboardController::class , 'index'])
->name('dashboard.index');

Route::get('/student-info',[DashboardController::class , 'registration_info'])
->name('student.registration');

Route::get('/student-table',[DashboardController::class , 'student_table'])
->name('student.table');

Route::get('logout',[AuthController::class , 'logout'])
 ->name('auth.logout');

});

Route::get('/terms-conditions',[TermsConditionsController::class , 'index'])
->name('terms.index');


Route::get('/testimonials',[TestimonialController::class , 'index'])
->name('testimonials.index');
