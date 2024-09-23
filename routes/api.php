<?php

use App\Http\Controllers\Api\Advertise\AdController;
use App\Http\Controllers\Api\Advertise\BookmarkController;
use App\Http\Controllers\Api\Advertise\CategoryController;
use App\Http\Controllers\Api\Advertise\NoticeController;
use App\Http\Controllers\Api\Advertise\PriceListController;
use App\Http\Controllers\Api\Advertise\ProvinceController;
use App\Http\Controllers\Api\Common\OtpController;
use App\Http\Controllers\Api\Common\SessionController;
use App\Http\Controllers\Api\Common\UserController;
use App\Http\Controllers\Api\Panel\ProvinceController as PanelProvinceController;
use App\Models\Land;
use Illuminate\Support\Facades\Route;


/**-------------------------***
 * Control Panel
 * --------------------------*/
Route::prefix('provinces')->name('province.')
    ->controller(PanelProvinceController::class)->group(function () {
        Route::get('/', 'provinces')->name('provinces');
        Route::get('{province}/cities', 'cities')->name('cities');
    });

Route::get('slug/{title}', function ($title) {
    return \Illuminate\Support\Str::slug($title);
});
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

Route::get('/v1/notice', [NoticeController::class, 'fetchNotices']);
Route::get('/v1/notice/{slug}', [NoticeController::class, 'single']);

Route::get('/otp/request', [OtpController::class, 'requestOtp']);
Route::get('/otp/verify', [OtpController::class, 'verifyOtp']);
Route::post('/otp/refresh', [OtpController::class, 'refreshToken']);
Route::get('/logout', [OtpController::class, 'logout'])->middleware('auth:sanctum');

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
    Route::prefix('note')->name('note.')->controller(\App\Http\Controllers\Api\v1\NoteController::class)->group(function () {
        Route::post('write', 'write')->name('write');
    });

    /* Feedback */
    Route::prefix('feedback')->name('feedback.')->controller(\App\Http\Controllers\Api\Advertise\FeedbackController::class)->group(function () {
        Route::post('liked', 'liked')->name('liked');
    });

    /* Report */
    Route::prefix('report')->name('report.')->controller(\App\Http\Controllers\Api\Advertise\ReportController::class)->group(function () {
        Route::post('send', 'send')->name('send');
    });
});

