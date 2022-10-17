<?php

use App\Http\Controllers\API\MiscController;
use App\Http\Controllers\API\PasswordController;
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

Route::middleware('localization')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::post('/register', 'API\UserController@register');
        Route::post('/login', 'API\UserController@login');
        Route::post('/send-new-password', 'API\UserController@sendPassword');
        Route::post('/destroyUser/{id}', 'API\UserController@destroyUser');

        //get countries
        Route::get('/all-cities', 'API\MiscController@getAllCities');
        Route::get('/all-countries', 'API\MiscController@getAllCountries');
        //posts
        Route::get('/post/{id}', 'API\MiscController@post');
        Route::get('/posts', 'API\MiscController@posts');
        Route::get('/latest-post', 'API\MiscController@latestPost');
        //ads
        Route::get('/oneAd/{id}', 'API\MiscController@oneAd');
        Route::get('/ads', 'API\MiscController@ads');
        Route::get('/latest-ads', 'API\MiscController@latestAds');
        Route::post('ads/store', [MiscController::class, 'storeAd']);
        Route::post('ads/update/{id}', [MiscController::class, 'updateAd']);
        Route::post('ads/destroy', [MiscController::class, 'destroyAd']);

        Route::get('/category/{id}', 'API\MiscController@category');
        Route::get('/categories', 'API\MiscController@categories');

        Route::get('/search', 'API\UserController@search');

        Route::post('/contact', 'API\MiscController@contact');

        Route::get('/pages', 'API\MiscController@pages');
        Route::get('/page/{id}', 'API\MiscController@page');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', 'API\UserController@logout');
            Route::post('/update-profile', 'API\UserController@updateProfile');

            Route::post('/location', 'API\UserController@updateLocation');

            Route::post('/count-click', 'API\MiscController@service_provider_click');

            Route::post('/add-request', 'API\MiscController@createRequest');
            Route::post('/send-response', 'API\MiscController@createResponse');
            Route::get('/response-request', 'API\MiscController@getRequestResponse');

            // as a user
            Route::get('/user/all-requests', 'API\MiscController@getAllSentRequests');
            Route::get('/user/outgoing-requests', 'API\MiscController@outgoingRequests');
            Route::get('/user/incoming-requests', 'API\MiscController@incomingRequests');

            Route::get('/user/all-responses', 'API\MiscController@getAllResponses');

            Route::post('/add-token', 'API\MiscController@addToken');

            Route::post('/review', 'API\MiscController@review');

            Route::get('/notifications', 'API\UserController@notifications');
            Route::post('/notifications', 'API\UserController@markAsReadNotifications');

            Route::get('/settings', 'API\MiscController@settings');
        });
    });
});
// Route::middleware('changeLanguage')->group(function () {
//     
// });

Route::post('password/forgot-password', [PasswordController::class, 'sendResetLinkResponse'])->name('passwords.sent');
Route::post('password/reset', [PasswordController::class, 'sendResetResponse'])->name('passwords.reset');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::fallback(function(){
//    return response()->json(['message' => 'Page Not Found'], 404);
//});
