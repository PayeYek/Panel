<?php

use App\Events\MessageSent;
use App\Http\Controllers\Api\v1\AdController;
use App\Http\Controllers\Api\v1\AnnounceController;
use App\Http\Controllers\Api\v1\VerticalAnnounceController;
use App\Http\Controllers\Api\v1\ArticleController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BookmarkController;
use App\Http\Controllers\Api\v1\DailyPriceController;
use App\Http\Controllers\Api\v1\FeedbackController;
use App\Http\Controllers\Api\v1\NoteController;
use App\Http\Controllers\Api\v1\NoticeController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\ProvinceController;
use App\Http\Controllers\Api\v1\ReportController;
use App\Http\Controllers\Api\v1\UserController;
use App\Models\User;
use App\Notifications\PrivateNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;


Route::post('test', function () {
//    $ad = \App\Models\Ad::find(1);
//    event(new AdPublished($ad));
//    return $ad;

    $name = request()->input('name');
    $body = request()->input('body');
    $dir = request()->input('dir');
    $icon = request()->input('icon');
    $badge = request()->input('badge');
    $tag = request()->input('tag');
    $image = request()->input('image');
    event(new MessageSent($name, $body, $dir, $icon, $badge, $tag, $image));
    return response()->json(['status' => 'Message Sent!']);
});

Route::post('private', function () {
    $user = User::find(request()->user_id);
    Notification::send($user, new PrivateNotification('This is a private notification'));

    return $user;
});


/**-------------------------***
 * Authentication OTP
 * --------------------------*/
Route::prefix('auth')->name('auth.')
    ->controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('verify', 'verify')->name('verify');
        Route::get('logout', 'logout')->name('logout');
    });


/**-------------------------***
 * Application
 * --------------------------*/
Route::prefix('ad')->name('ad.')->controller(AdController::class)->group(function () {
    /* Search */
    Route::get('search', 'search')->name('search');

    /* Categories */
    Route::get('categories', 'categories')->name('categories');

    /* Similar */
    Route::get('{ad}/similar', 'similar')->name('similar');

    /* Mobile call number */
    Route::get('{ad}/mobile', 'mobile')->name('mobile');

    /* Bookmark */
    Route::prefix('bookmark')->name('bookmark.')
        ->controller(BookmarkController::class)->group(function () {
            Route::post('toggle', 'toggle')->name('toggle');
        });

    /* Note */
    Route::prefix('note')->name('note.')
        ->controller(NoteController::class)->group(function () {
            Route::post('write', 'write')->name('write');
        });

    /* Feedback */
    Route::prefix('feedback')->name('feedback.')
        ->controller(FeedbackController::class)->group(function () {
            Route::post('liked', 'liked')->name('liked');
        });

    /* Report */
    Route::prefix('report')->name('report.')
        ->controller(ReportController::class)->group(function () {
            Route::post('advertise', 'advertise')->name('advertise');
            Route::post('mobile', 'mobile')->name('mobile');
        });
});
Route::resource('ad', AdController::class)->except(['create']);

Route::resource('article', ArticleController::class)->except(['edit', 'update', 'destroy', 'create']);

/**-------------------------***
 * Announce
 * --------------------------*/
Route::prefix('announce')->name('announce.')->controller(AnnounceController::class)->group(function () {
    Route::get('index', 'index')->name('index');
});

/**-------------------------***
 * Vertical Announce
 * --------------------------*/
Route::prefix('vertical_announce')->name('vertical_announce.')->controller(VerticalAnnounceController::class)->group(function () {
    Route::get('index', 'index')->name('index');
});


/**-------------------------***
 * User account menus
 * --------------------------*/
Route::prefix('user')->name('user.')
    ->controller(UserController::class)->group(function () {
        /* Profile */
        Route::resource('profile', ProfileController::class)->except(['index', 'create', 'store', 'destroy']);

        /* Advertise list */
        Route::get('advertises', 'advertises')->name('advertises');

        /* Note list */
        Route::get('notes', 'notes')->name('notes');

        /* bookmarks list */
        Route::get('bookmarks', 'bookmarks')->name('bookmarks');

        /* Recent view list */
        Route::get('views', 'views')->name('views');

        /* Notice list */
        Route::resource('notice', NoticeController::class);
    });


/**-------------------------***
 * Daily car price
 * --------------------------*/
Route::prefix('price')->name('daily_price.')
    ->controller(DailyPriceController::class)->group(function () {
        Route::get('/', 'list')->name('list');
    });


/**-------------------------***
 * Data handler
 * --------------------------*/
Route::prefix('data')->name('data.')->group(function () {
    Route::prefix('province')->name('province.')
        ->controller(ProvinceController::class)->group(function () {
            Route::get('/list', 'provinces')->name('provinces');
            Route::get('{province}/cities', 'cities')->name('cities');
        });
});


Route::get('/article_companies', [ArticleController::class, 'getAllCompanies']);
Route::get('/related_article/{articleId}', [ArticleController::class, 'relatedArticles']);
