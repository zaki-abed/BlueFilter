<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Setting;

use App\Http\Livewire\homepage;
use App\Http\Livewire\Dashboard;
use GuzzleHttp\Psr7\ServerRequest;
use App\Models\Setting as Settings;
use App\Http\Livewire\showSubscribe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ProviderRequest;
use App\Http\APIResources\PostResource;
use App\Http\APIResources\UserResource;
use App\Http\Livewire\ProviderResponse;
use App\Http\APIResources\PostsResource;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;

use App\Http\APIResources\CategoryResource;

use App\Http\Livewire\City\Edit as CityEdit;
use App\Http\Livewire\Page\Edit as PageEdit;

use App\Http\Livewire\Page\View as PageView;
use App\Http\Livewire\Post\Edit as PostEdit;
use App\Http\Livewire\Post\View as PostView;
use App\Http\Livewire\User\Edit as UserEdit;
use App\Http\Livewire\Ads\View as AdsView;
use App\Http\Livewire\Ads\Edit as AdsEdit;

use App\Http\APIResources\CategoriesResource;
use App\Http\Controllers\SubscribeController;
use App\Http\Livewire\City\Index as CityIndex;

use App\Http\Livewire\Page\Index as PageIndex;
use App\Http\Livewire\Post\Index as PostIndex;
use App\Http\Livewire\User\Index as UserIndex;
use App\Http\Livewire\Ads\Index as AdsIndex;

use App\Http\Livewire\City\Create as CityCreate;

use App\Http\Livewire\Page\Create as PageCreate;
use App\Http\Livewire\Post\Create as PostCreate;
use App\Http\Livewire\User\Create as UserCreate;
use App\Http\Livewire\Ads\Create as AdsCreate;
use App\Http\Livewire\Country\Edit as CountryEdit;

use App\Http\Livewire\Country\Index as CountryIndex;
use App\Http\Livewire\Category\Index as CategoryIndex;
use App\Http\Livewire\Country\Create as CountryCreate;
use App\Http\Livewire\User\LoginHistory as UserHistory;
use App\Http\Livewire\Category\Create as CategoryCreate;
use App\Http\Livewire\ContactQueries\Index as ContactQueriesIndex;
use App\Http\Livewire\Notifications\Create as NotificationsCreate;
use App\Http\Livewire\Notifications\History as NotificationsHistory;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');




Route::get('/post/{lang}/{id}', [App\Http\Controllers\FrontendController::class, 'getPost']);
Route::get('/ads/{lang}/{id}', [App\Http\Controllers\FrontendController::class, 'getAds']);
Route::get('/{lang?}', [App\Http\Controllers\FrontendController::class, 'getHomepage'])->name('home')
->where('lang', 'ar|en');;
Route::post('/form', [App\Http\Controllers\FrontendController::class, 'createForm']);

Auth::routes(['verify' => false, 'register' => false]);
Route::post('reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


 Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/subscribes', showSubscribe::class)->name('subscribe.index');

        Route::get('user/create', UserCreate::class)->name('user.create');
        Route::get('user/edit/{id}', UserEdit::class)->name('user.edit');
        Route::get('user', UserIndex::class)->name('user.index');

        Route::get('user/login-history/{id}', UserHistory::class)->name('user.history');
        Route::get('user/views', [UserController::class, 'serviceProviderViews'])->name('user.views');

        Route::get('contact-queries', ContactQueriesIndex::class)->name('contact-queries.index');
        //requests
        Route::get('requests', ProviderRequest::class)->name('requests');
        Route::get('response/{id}', ProviderResponse::class);


        Route::get('setting', Setting::class)->name('settings');
        Route::get('homepage', homepage::class)->name('homepages');
        Route::get('profile', Profile::class)->name('profile');

        Route::get('category/create', CategoryCreate::class)->name('category.create');
        Route::get('category', CategoryIndex::class)->name('category.index');

        Route::get('page/create', PageCreate::class)->name('page.create');
        Route::get('page', PageIndex::class)->name('page.index');
        Route::get('page/edit/{id}', PageEdit::class)->name('page.edit');
        Route::get('page/view/{id}', PageView::class)->name('page.view');

        Route::get('post/create', PostCreate::class)->name('post.create');
        Route::get('post', PostIndex::class)->name('post.index');
        Route::get('post/edit/{id}', PostEdit::class)->name('post.edit');
        Route::get('post/view/{id}', PostView::class)->name('post.view');


        Route::get('ads/create', AdsCreate::class)->name('ads.create');
        Route::get('ads', AdsIndex::class)->name('ads.index');
        Route::get('ads/edit/{id}', AdsEdit::class)->name('ads.edit');
        Route::get('ads/view/{id}', AdsView::class)->name('ads.view');


        Route::get('city/create', CityCreate::class)->name('city.create');
        Route::get('city',CityIndex::class)->name('city.index');
        Route::get('city/edit/{id}', CityEdit::class)->name('city.edit');

        Route::get('country/create', CountryCreate::class)->name('country.create');
        Route::get('country', CountryIndex::class)->name('country.index');
        Route::get('country/edit/{id}', CountryEdit::class)->name('country.edit');

        Route::get('notifications/create', NotificationsCreate::class)->name('notifications.create');
        Route::get('notifications/history', NotificationsHistory::class)->name('notifications.history');

        Route::get('media/gallery', [MediaController::class, 'index'])->name('media.index');
        Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
        Route::delete('media/gallery/delete', [MediaController::class, 'deleteImages'])->name('media.delete');
        Route::get('media/selector', [MediaController::class, 'browseMedia'])->name('media.browse');
    });
 });

