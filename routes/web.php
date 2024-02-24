<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['splade'])->group(function () {

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::prefix('panel')->name('panel.')->group(function () {

        /* DASHBOARD */
        Route::get('/', fn() => redirect()->route('panel.dashboard'))->name('home');
        Route::get('dashboard', [\App\Http\Controllers\Panel\DashboardController::class, 'index'])->name('dashboard');

        /* Landing */
        Route::prefix('landing')->name('landing.')->group(function () {
            // Lands - Showcase pages (vitrine)
            Route::resource('land', \App\Http\Controllers\Panel\Land\LandController::class)->except('show');
            // Land Categories
            Route::resource('category', \App\Http\Controllers\Panel\Land\CategoryController::class)->except('show');
            // Land Attributes
            Route::resource('attribute', \App\Http\Controllers\Panel\Land\AttributeController::class)->except('show');
            // Land Brands
            Route::resource('brand', \App\Http\Controllers\Panel\Land\BrandController::class)->except('show');
            // Land Colors
            Route::resource('color', \App\Http\Controllers\Panel\Land\ColorController::class)->except('show');
            // Land Products
            Route::resource('product', \App\Http\Controllers\Panel\Land\ProductController::class)->except('show');
            Route::prefix('product')->name('product.')->controller(\App\Http\Controllers\Panel\Land\ProductController::class)->group(function () {
                Route::get('{product}/attribute', 'attributeEdit')->name('attribute.edit');
                Route::put('{product}/attribute', 'attributeUpdate')->name('attribute.update');
            });
            // Land Articles
            Route::resource('article', \App\Http\Controllers\Panel\Land\ArticleController::class)->except('show');
            // Land Slides
            Route::resource('slide', \App\Http\Controllers\Panel\Land\SlideController::class)->except('show');
            // Land Videos
            Route::resource('video', \App\Http\Controllers\Panel\Land\VideoController::class)->except('show');
            // Land Files
            Route::resource('file', \App\Http\Controllers\Panel\Land\FileController::class)->except('show');
        });


        /* USERS */
        Route::resource('user', \App\Http\Controllers\Panel\UserController::class)->except('show');

        /* PROFILE */
        Route::get("login", [\App\Http\Controllers\Panel\ProfileController::class, 'login'])->name('profile.login');
        Route::get("logout", [\App\Http\Controllers\Panel\ProfileController::class, 'logout'])->name('profile.logout');

    });

    Route::prefix('l')
        ->name('landing.')
        ->controller(\App\Http\Controllers\Landing\LandingController::class)
        ->group(function () {

            Route::name('page.')->group(function () {
                Route::get('/', 'pages')->name('list');
                Route::get('{page}', 'page')->name('show');
                Route::get('{page}/about', 'about')->name('about');
                Route::get('{page}/catalogs', 'catalogs')->name('catalogs');
            });

            Route::name('product.')->group(function () {
                Route::get('{page}/p', 'products')->name('list');
                Route::get('{page}/p/{product}', 'product')->name('show');
                Route::get('{page}/c/{category}', 'category')->name('category');
            });

            Route::name('article.')->group(function () {
                Route::get('{page}/a', 'articles')->name('list');
                Route::get('{page}/a/{article}', 'article')->name('show');
            });

        });

    Route::get('/', function () {
        $lands = \App\Models\Land::get();
        return view('landing.index', compact('lands'));
    })->name('index');


});

/* LOCALIZATION */
Route::get('/lang/{locale}', [\App\Http\Controllers\Controller::class, 'languageUi']);


