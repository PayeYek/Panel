<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Common\PermissionController;
use App\Http\Controllers\Web\Common\RoleController;
use App\Http\Controllers\Web\Panel\Advertise\AdController;
use App\Http\Controllers\Web\Panel\Advertise\CategoryController;
use App\Http\Controllers\Web\Panel\Advertise\PriceListController;
use App\Http\Controllers\Web\Panel\AnnounceController;
use App\Http\Controllers\Web\Panel\NoticeOfSale\NoticeOfSaleController;
use App\Http\Controllers\Web\Panel\VerticalAnnounceController;
use App\Http\Controllers\Web\Panel\AuthController;
use App\Http\Controllers\Web\Panel\Blog\ArticleController;
use App\Http\Controllers\Web\Panel\Blog\CompanyController;
use App\Http\Controllers\Web\Panel\Blog\FileController;
use App\Http\Controllers\Web\Panel\CommentController;
use App\Http\Controllers\Web\Panel\DashboardController;
use App\Http\Controllers\Web\Panel\ProfileController;
use App\Http\Controllers\Web\Panel\TagController;
use App\Http\Controllers\Web\Panel\UserController;
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

            /* HOME */
            Route::get('/home', fn() => view('home.index'))->name('index');
            /*ADVERTISE*/
            Route::get('/ad', fn() => view('home.ad'))->name('ad');

        });

    /**
     * |--------------------------------------------------------------------------
     * | CONTROL PANEL
     * |--------------------------------------------------------------------------
     */
    Route::middleware(['auth', 'role:super-admin|admin|manager|moderator|editor|author'])->group(function () {
        Route::name('panel.')->group(function () {

            /*Role and permissions */
            Route::resource('role', RoleController::class);
            Route::resource('permission', PermissionController::class);

            /* DASHBOARD */
            Route::get('/', fn() => redirect()->route('panel.advertise.ad.index'))->name('home');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            /* Advertise */
            Route::prefix('advertise')->name('advertise.')->group(function () {
                /* Ad */
                Route::resource('ad', AdController::class)->except(['show']);
                Route::get('ad/{ad}/state', [AdController::class,'state'])->name('state');

                /* Category */
                Route::resource('category', CategoryController::class)->except(['show']);

                /* Tag */
                Route::resource('tag', TagController::class)->except('show');
            });

            Route::resource('priceList', PriceListController::class)->except(['show']);

            Route::resource('announce', AnnounceController::class);

            Route::resource('vertical_announce', VerticalAnnounceController::class);


/*            Route::prefix('ad')->name('ad.')->group(function () {
                Route::resource('advertise', AdController::class);
//                Route::resource('advertise', AdvertiseController::class)->except(['show', 'update']);
                Route::resource('category', AdCategoryController::class)->except(['show']);
                Route::resource('usage', UsageController::class)->except(['show']);
                Route::resource('color', AdColorController::class)->except(['show']);
                Route::resource('specification', SpecificationController::class)->except(['show']);
                Route::resource('brand-model', AdBrandController::class)->except(['show']);
                Route::resource('priceList', PriceListController::class)->except(['show']);
            });*/

            /* Blog */
            Route::prefix('blog')->name('blog.')->group(function () {
                // Company
                Route::resource('company', CompanyController::class)->except('show');
                // Articles
                Route::resource('article', ArticleController::class)->except('show');
                // Files
                Route::resource('file', FileController::class)->except('show');
            });

            Route::prefix('noticeOfSale')->name('noticeOfSale.')->group(function () {
                // Company
                Route::resource('company', CompanyController::class)->except('show');
                // Articles
                Route::resource('list', NoticeOfSaleController::class)->except('show');
            });

            /* NoticeOfSale */
//            Route::resource('notice-of-sale',NoticeOfSaleController::class);
            /* Landing */
            /*Route::prefix('landing')->name('landing.')->group(function () {
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
                    Route::get("attribute-priority", [AttributeController::class, 'priorityEdit'])->name('attribute.priority.edit');
                    Route::put("attribute-priority", [AttributeController::class, 'priorityUpdate'])->name('attribute.priority.update');
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
                // Customer Feedback
                Route::resource('customer-feedback', CustomerFeedbackController::class)->except('show');
                // Sales Expert
                Route::resource('sales-expert', SalesExpertController::class)->except('show');
                // Announcement
                Route::resource('announcement', AnnouncementController::class)->except('show');
                // Contact Us
                Route::resource('contact', ContactUsController::class)->except('show');
                // Land Comment
                Route::resource('comment', LandComment::class)->except('show');
                Route::prefix('comment')->name('comment.')->controller(LandComment::class)->group(function () {
                    Route::post('{comment}/publish', 'publish')->name('publish');
                    Route::post('{comment}/hidden', 'hidden')->name('hidden');
                });

            });*/

            // COMMENTS
            Route::resource('comment', CommentController::class)->except('show');
            Route::prefix('comment')->name('comment.')->controller(CommentController::class)->group(function () {
                Route::post('{comment}/publish', 'publish')->name('publish');
                Route::post('{comment}/hidden', 'hidden')->name('hidden');
            });

            /* USERS */
            Route::resource('user', UserController::class)->except('show')->middleware('role:super-admin|admin');

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

    /*
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
    */

    Route::get('/', function () {
        return to_route('panel.advertise.ad.index');
//        $lands = Land::get();
//        return view('landing.index', compact('lands'));
//        return view('landing.index');
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




