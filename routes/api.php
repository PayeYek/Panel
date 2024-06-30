<?php

use App\Http\Controllers\Api\Advertise\AdController;
use App\Http\Controllers\Api\Advertise\BookmarkController;
use App\Http\Controllers\Api\Advertise\CategoryController;
use App\Http\Controllers\Api\Advertise\PriceListController;
use App\Http\Controllers\Api\Advertise\ProvinceController;
use App\Http\Controllers\Api\Common\OtpController;
use App\Http\Controllers\Api\Common\SessionController;
use App\Http\Controllers\Api\Common\UserController;
use App\Http\Controllers\Api\Landing\LandingApiController;
use App\Models\Land;
use App\Models\Province;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* todo: reset prefix and clean routes */

Route::get('/user', [UserController::class, 'getUser'])->middleware('auth:sanctum');/* Profile */
Route::get('/user/ads', [UserController::class, 'getMyAds'])->middleware('auth:sanctum');/* User Ads */

Route::get('/otp/request', [OtpController::class, 'requestOtp']);
Route::get('/otp/verify', [OtpController::class, 'verifyOtp']);
Route::post('/otp/refresh', [OtpController::class, 'refreshToken']);
Route::get('/logout', [OtpController::class, 'logout'])->middleware('auth:sanctum');

Route::get('provinces', function () {
    return Province::get();
});

/* use in panel */
Route::get('provinces/{provinceId}/cities', function ($provinceId) {
    $province = Province::with('cities')->find($provinceId);
    return $province->cities;
});

/* use in panel */
Route::get('land/{landId}/products', function ($landId) {
    $land = Land::with('products')->find($landId);
    return $land->products()->latest()->get()->pluck('name', 'id');
});

/* for JWT */
Route::group(['middleware' => ['auth:api', 'enforce.session']], function () {
    Route::get('/current-session', [SessionController::class, 'getCurrentSession']);
    Route::get('/all-sessions', [SessionController::class, 'getAllSessions']);
    Route::delete('/remove-session', [SessionController::class, 'removeSession']);
    Route::delete('/remove-all-sessions', [SessionController::class, 'removeAllSessions']);
});

Route::prefix('ad')
    ->name('api.ad.')
    ->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('bookmarks', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
            Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
        });
        Route::controller(ProvinceController::class)->group(function () {
            Route::get('provinces', 'getProvinces')->name('getProvinces');
            Route::get('cities/{province}', 'getCitiesByProvince')->name('getCities');
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::get('categories', 'getCategories')->name('getCategories');
        });
        Route::controller(AdController::class)->group(function () {
            Route::get('/search', 'search')->name('search');
            Route::get('/list', 'getList')->name('getList');
            Route::get('/price-range', 'getPriceRange')->name('getPriceRange');
            Route::post('submit', 'submit')->name('submitAdvertise')->middleware('auth:sanctum');
            Route::put('update/{advertise}', 'update')->name('updateAdvertise')->middleware('auth:sanctum');
            Route::get('/{advertise}', 'show')->name('showAdvertise');
            Route::delete('/{advertise}', 'destroy')->name('destroyAdvertise')->middleware('auth:sanctum');

            Route::get('/{advertise}/mobile', 'getMobile')->name('getMobile')->middleware('auth:sanctum');
            //Route::get('specifications/{usage}', 'getSpecificationsByUsage')->name('getSpecifications');
            //Route::get('brand/list', 'getBrands')->name('brandList');
            //Route::get('brand/{brand}/models', 'getModelByBrand')->name('brandModels');

            Route::prefix('price')->name('price.')->controller(PriceListController::class)->group(function () {
                Route::get('/categorized-list', 'getCategorizedList')->name('CategorizedList');
                Route::get('/list', 'getList')->name('list');
            });
        });
    });

Route::prefix('ad')->name('ad.')->group(function () {
    /* Note */
    Route::prefix('note')->name('note.')->controller(\App\Http\Controllers\Api\Advertise\NoteController::class)->group(function () {
        Route::post('write', 'write')->name('write');
    });

    /* Feedback */
    Route::prefix('feedback')->name('feedback.')->controller(\App\Http\Controllers\Api\Advertise\FeedbackController::class)->group(function () {
        Route::post('liked', 'liked')->name('liked');
    });
});


Route::prefix('user')->name('user.')->controller(\App\Http\Controllers\Api\User\UserController::class)->group(function () {
    /* Note list */
    Route::get('notes',  'notes')->name('notes');
});

Route::prefix('l')
    ->name('api.landing.')
    ->controller(LandingApiController::class)
    ->group(function () {
        Route::name('page.')->group(function () {
            Route::get('/pages', 'pages')->name('list');
            Route::get('/landing', 'landing')->name('landing');
            Route::get('/customer-feedback', 'getCustomerFeedback')->name('customerFeedback');
            Route::get('/subland-products', 'getSubLandProducts')->name('getSubLandProducts');
            Route::get('/sales-expert', 'getSalesExpert')->name('getSalesExpert');
            Route::post('/contact-us', 'contactUs')->name('contactUs');
            Route::get('/announcements', 'getAnnouncements')->name('getAnnouncements');
            Route::get('/categories', 'getCategories')->name('getCategories');
            Route::get('{page}', 'page')->name('show');
            Route::get('{page}/about', 'about')->name('about');
            Route::get('{page}/footer', 'pageFooter')->name('footer');
            Route::get('{page}/catalogs', 'catalogs')->name('catalogs');
            Route::get('{page}/calculator', 'calculator')->name('calculator');
            Route::post('/facilities-request', 'facilitiesRequest')->name('facilitiesRequest');
            Route::get('{page}/facility', 'facility')->name('facility');
            Route::post('/subscribe', 'subscribe')->name('subscribe');
        });

        Route::name('product.')->group(function () {
            Route::get('/p/products-list', 'getAllProducts')->name('all');
            Route::get('{page}/p', 'getLandProducts')->name('list');
            Route::get('{page}/p/{product}', 'product')->name('show');
            Route::get('{page}/c/{category}', 'category')->name('category');
            Route::get('p/{product}/specification', 'productSpecification')->name('specification');
            Route::get('p/{product}/information', 'productInformation')->name('information');
            Route::get('p/{product}/videos', 'productVideos')->name('videos');
            Route::get('p/search', 'searchProducts')->name('search');
        });

        Route::name('article.')->group(function () {
            Route::get('a/search', 'searchArticles')->name('search');
            Route::get('{page}/a', 'articles')->name('list');
            Route::get('{page}/a/{article}', 'article')->name('show');
        });

        //Todo change urls and add page/ before any routes get pages dynamically
        Route::name('comment.')->group(function () {
            Route::get('comment/get-comment', 'getComments')->name('getComments');
            Route::post('comment/submit-comment', 'submitComment')->name('submitComment');
        });

        Route::get('{page}/sale-terms', 'saleTerms')->name('saleTerms');

        Route::get('{page}/sales', 'sales')->name('sales');
        Route::get('{page}/videos', 'videos')->name('videos');

//        Route::get('{page}/advertise', 'advertise')->name('advertise');
    });
