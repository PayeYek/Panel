<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('provinces', function () {
    return \App\Models\Province::get();
});

Route::get('provinces/{provinceId}/cities', function ($provinceId) {
    $province = \App\Models\Province::with('cities')->find($provinceId);
    return $province->cities;
});

Route::get('land/{landId}/products', function ($landId) {
    $land = \App\Models\Land::with('products')->find($landId);
    return $land->products()->latest()->get()->pluck('name', 'id');
});

Route::prefix('l')
    ->name('landing.')
    ->controller(\App\Http\Controllers\Landing\LandingApiController::class)
    ->group(function () {

        Route::name('page.')->group(function () {
            Route::get('/pages', 'pages')->name('list');
            Route::get('{page}', 'page')->name('show');
            Route::get('{page}/about', 'about')->name('about');
            Route::get('{page}/footer', 'pageFooter')->name('footer');
            Route::get('{page}/catalogs', 'catalogs')->name('catalogs');
            Route::get('{page}/calculator', 'calculator')->name('calculator');

        });

        Route::name('product.')->group(function () {
            Route::get('{page}/p', 'products')->name('list');
            Route::get('{page}/p/{product}', 'product')->name('show');
            Route::get('{page}/c/{category}', 'category')->name('category');
            Route::post('{page}/p/{product}/comment', 'comment')->name('comment');
        });

        Route::name('article.')->group(function () {
            Route::get('{page}/a', 'articles')->name('list');
            Route::get('{page}/a/{article}', 'article')->name('show');
        });

        Route::get('{page}/sales', 'sales')->name('sales');
        Route::get('{page}/videos', 'videos')->name('videos');

        Route::get('{page}/advertise', 'advertise')->name('advertise');
    });
