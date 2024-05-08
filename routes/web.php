<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Landing\LandingController;
use App\Http\Controllers\Web\Panel\AdvertisementController;
use App\Http\Controllers\Web\Panel\AuthController;
use App\Http\Controllers\Web\Panel\CommentController;
use App\Http\Controllers\Web\Panel\DashboardController;
use App\Http\Controllers\Web\Panel\Land\AgencyController;
use App\Http\Controllers\Web\Panel\Land\ArticleController;
use App\Http\Controllers\Web\Panel\Land\AttributeController;
use App\Http\Controllers\Web\Panel\Land\BrandController;
use App\Http\Controllers\Web\Panel\Land\CategoryController;
use App\Http\Controllers\Web\Panel\Land\ColorController;
use App\Http\Controllers\Web\Panel\Land\FacilitiesController;
use App\Http\Controllers\Web\Panel\Land\FileController;
use App\Http\Controllers\Web\Panel\Land\LandController;
use App\Http\Controllers\Web\Panel\Land\ProductController;
use App\Http\Controllers\Web\Panel\Land\SlideController;
use App\Http\Controllers\Web\Panel\Land\VideoController;
use App\Http\Controllers\Web\Panel\ProfileController;
use App\Http\Controllers\Web\Panel\UserController;
use App\Models\Land;
use Illuminate\Support\Facades\Route;

Route::middleware(['splade'])->group(function () {

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    /**
     * |--------------------------------------------------------------------------
     * | HOME
     * |--------------------------------------------------------------------------
     */
    Route::name('home.')
        ->group(function () {

            /* DASHBOARD */
            Route::get('/home', fn() => view('home.index'))->name('index');

        });

    /**
     * |--------------------------------------------------------------------------
     * | CONTROL PANEL
     * |--------------------------------------------------------------------------
     */
    Route::middleware(['auth'])->group(function () {
        Route::prefix('panel')->name('panel.')->group(function () {

            /* DASHBOARD */
            Route::get('/', fn() => redirect()->route('panel.landing.land.index'))->name('home');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            /* Landing */
            Route::prefix('landing')->name('landing.')->group(function () {
                // Lands - Showcase pages (vitrine)
                Route::resource('land', LandController::class)->except('show');
                Route::prefix('land')->name('land.')->controller(LandController::class)->group(function () {
                    Route::get('{land}/style', 'styleEdit')->name('style.edit');
                    Route::put('{land}/style', 'styleUpdate')->name('style.update');
                });
                // Land Product
                Route::prefix('product')->name('product.')->group(function () {
                    // Land Products
                    Route::resource('product', ProductController::class)->except('show');
                    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
                        Route::get('{product}/attribute', 'attributeEdit')->name('attribute.edit');
                        Route::put('{product}/attribute', 'attributeUpdate')->name('attribute.update');
                    });
                    // Land Categories
                    Route::resource('category', CategoryController::class)->except('show');
                    // Land Attributes
                    Route::resource('attribute', AttributeController::class)->except('show');
                    // Land Brands
                    Route::resource('brand', BrandController::class)->except('show');
                    // Land Colors
                    Route::resource('color', ColorController::class)->except('show');
                });

                // Land Agencies
                Route::resource('agency', AgencyController::class)->except('show');
                // Land Articles
                Route::resource('article', ArticleController::class)->except('show');
                // Land Facilities
                Route::resource('facility', FacilitiesController::class)->except(['show', 'create', 'store']);
                // Land Slides
                Route::resource('slide', SlideController::class)->except('show');
                // Land Videos
                Route::resource('video', VideoController::class)->except('show');
                // Land Files
                Route::resource('file', FileController::class)->except('show');
                // Advertisement
                Route::resource('advertisement', AdvertisementController::class)->except('show');

            });

            // COMMENTS
            Route::resource('comment', CommentController::class)->except('show');
            Route::prefix('comment')->name('comment.')->controller(CommentController::class)->group(function () {
                Route::post('{comment}/publish', 'publish')->name('publish');
                Route::post('{comment}/hidden', 'hidden')->name('hidden');
            });

            /* USERS */
            Route::resource('user', UserController::class)->except('show');

            /* PROFILE */
            Route::get("login", [ProfileController::class, 'login'])->name('profile.login');
            Route::get("logout", [ProfileController::class, 'logout'])->name('profile.logout');

        });
    });


    /**
     * |--------------------------------------------------------------------------
     * | LANDING
     * |--------------------------------------------------------------------------
     */
    Route::prefix('l')
        ->name('landing.')
        ->controller(LandingController::class)
        ->group(function () {

            Route::name('page.')->group(function () {
                Route::get('/', 'pages')->name('list');
                Route::get('{page}', 'page')->name('show');
                Route::get('{page}/about', 'about')->name('about');
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

    Route::get('/', function () {
        $lands = Land::get();
        return view('landing.index', compact('lands'));
    })->name('index');


    /* AUTHENTICATION PANEL */
    Route::prefix('auth')->name('auth.')
        ->controller(AuthController::class)
        ->group(function () {
            Route::post('logout', 'logout')->name('logout');

            Route::get('login', 'login')->name('login');
            Route::post('login', 'enter')->name('enter');

            Route::get('create', 'create')->name('create');
            Route::post('create', 'store')->name('store');
            Route::get('verify', 'verify')->name('verify');
            Route::post('verify', 'accept')->name('accept');
            Route::get('resend', 'resend')->name('resend');

            Route::get('forget', 'forget')->name('forget');
            Route::post('forget', 'code')->name('code');
            Route::get('confirm', 'confirm')->name('confirm');
            Route::post('confirm', 'recovery')->name('recovery');
            Route::get('recode', 'recode')->name('recode');
            Route::get('password', 'password')->name('password');
            Route::post('password', 'change')->name('change');

            Route::get('', function () {
                return redirect()->route('auth.login');
            });
        });

});

Route::get('/login', function () {
    return redirect(route('auth.login'));
})->name('login');

/* LOCALIZATION */
Route::get('/lang/{locale}', [Controller::class, 'languageUi']);



