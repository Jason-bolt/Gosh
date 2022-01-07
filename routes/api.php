<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/businesses', [ApiController::class, 'api_businesses']);
Route::post('/businesses', [ApiController::class, 'api_industry_businesses']);
Route::get('/businesses/{id}', [ApiController::class, 'api_business_details']);
Route::post('/contact', [ApiController::class, 'api_sendMail']);
//Route::get('/search', [ApiController::class, 'search']);
//Route::get('/faqs', [ApiController::class, 'faqs']);
//Route::get('/terms', [ApiController::class, 'terms']);

//Route::get('/pageNotFound', function ()
//{
//    return view('errors.404');
//})->name('404Page');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
