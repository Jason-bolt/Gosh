<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiProfileController;
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

// Public Routes
Route::post('/register', [ApiAuthController::class, 'api_register']);
Route::get('/recent_businesses', [ApiController::class, 'api_recent_businesses']);
Route::get('/businesses', [ApiController::class, 'api_businesses']);
Route::get('/industries', [ApiController::class, 'industries']);
Route::post('/businesses', [ApiController::class, 'api_industry_businesses']);
Route::get('/businesses/{id}', [ApiController::class, 'api_business_details']);
Route::post('/contact', [ApiController::class, 'api_sendMail']);
Route::get('/search', [ApiController::class, 'api_search']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/verification-notification', [ApiAuthController::class, 'api_send_email_verification']);
    Route::get('/verify-email/{id}/{hash}', [ApiAuthController::class, 'verify'])->name('verification.verify');
});


//// PROTECTED ROUTES
//Route::middleware(['auth'])->group(function () {
//    // Owner routes
//    Route::get('/profile', [ApiProfileController::class, 'index']);
//    Route::put('/edit_profile', [ApiProfileController::class, 'edit']);
//    Route::post('/clear_image', [ApiProfileController::class, 'clear_image']);
//    Route::post('/add_skill', [ApiProfileController::class, 'add_skill']);
//    Route::delete('/delete_skill/{id}', [ApiProfileController::class, 'delete_skill']);
//    Route::post('/add_business', [ApiProfileController::class, 'add_business']);
//    Route::get('/profile/my_business/{id}', [ApiProfileController::class, 'profile_business_details']);
//    Route::put('/profile/my_business/{id}', [ApiProfileController::class, 'update_business']);
//    Route::delete('/profile/my_business/{id}', [ApiProfileController::class, 'delete_business']);
//
//
//    // Admin routes
////    Route::get('/admin/businesses/pending', [AdminController::class, 'pending'])
////        ->name('businesses.pending');
////    Route::get('/admin/businesses/approved', [AdminController::class, 'approved'])
////        ->name('businesses.approved');
////    Route::get('/businesses/{id}/approve', [AdminController::class, 'approve_business']);
////    Route::get('/businesses/{id}/decline', [AdminController::class, 'decline_business']);
//});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
