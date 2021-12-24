<?php

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
Route::get('/businesses/{id}', [Controller::class, 'business_details']);
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/faqs', [Controller::class, 'faqs'])->name('faqs');
Route::get('/terms', [Controller::class, 'terms'])->name('terms');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile');



require __DIR__.'/auth.php';
