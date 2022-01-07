<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/businesses', [Controller::class, 'businesses'])->name('businesses');
Route::post('/businesses', [Controller::class, 'industry_businesses'])->name('industry_business');
//Route::get('/businesses/industry/{industry_id}', [Controller::class, 'industry_businesses']);
Route::get('/businesses/{id}', [Controller::class, 'business_details']);
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::post('/contact', [Controller::class, 'sendMail'])->name('sendMail');
Route::get('/search', [Controller::class, 'search'])->name('search');
Route::get('/faqs', [Controller::class, 'faqs'])->name('faqs');
Route::get('/terms', [Controller::class, 'terms'])->name('terms');

Route::get('/pageNotFound', function ()
    {
        return view('errors.404');
    })->name('404Page');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

// PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {
    // Owner routes
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');
    Route::put('/edit_profile', [ProfileController::class, 'edit'])
        ->name('edit_profile');
    Route::post('/clear_image', [ProfileController::class, 'clear_image'])
        ->name('clear_image');

    Route::post('/add_skill', [ProfileController::class, 'add_skill'])
        ->name('add_skill');
    Route::delete('/delete_skill/{id}', [ProfileController::class, 'delete_skill'])
        ->name('delete_skill');
    Route::post('/add_business', [ProfileController::class, 'add_business'])
        ->name('add_business');
    Route::get('/profile/my_business/{id}', [ProfileController::class, 'profile_business_details']);
    Route::put('/profile/my_business/{id}', [ProfileController::class, 'update_business']);
    Route::delete('/profile/my_business/{id}', [ProfileController::class, 'delete_business']);


    // Admin routes
    Route::get('/admin/businesses/pending', [AdminController::class, 'pending'])
        ->name('businesses.pending');
    Route::get('/admin/businesses/approved', [AdminController::class, 'approved'])
        ->name('businesses.approved');
    Route::get('/businesses/{id}/approve', [AdminController::class, 'approve_business']);
    Route::get('/businesses/{id}/decline', [AdminController::class, 'decline_business']);
});




require __DIR__.'/auth.php';
