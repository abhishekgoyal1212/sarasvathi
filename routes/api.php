<?php

use App\Http\Controllers\api\ChapterApiController;
use App\Http\Controllers\api\UserApiController;
use App\Http\Controllers\api\HomeApiController;
use App\Http\Controllers\api\BookmarkApiController;
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

Route::prefix('v1')->group(function () {
    Route::post('login-user', [UserApiController::class, 'loginUser']);
    Route::post('signup-user', [UserApiController::class, 'signupUser']);


    Route::get('logo', [HomeApiController::class, 'logo']);
    Route::get('banner', [HomeApiController::class, 'banner']);
    Route::get('loginpage', [HomeApiController::class, 'loginpage']);






    Route::middleware('auth:sanctum')->group(function () {
        Route::get('homepage', [HomeApiController::class, 'homepage']);
        Route::post('trending-chapter', [HomeApiController::class, 'trending_update']);
        Route::post('recommended-lesson', [HomeApiController::class, 'recommended_lesson']);

        Route::post('get-chapters', [ChapterApiController::class, 'chapters']);
        Route::post('get-sections', [ChapterApiController::class, 'section_page']);
        Route::post('get-single-chapter', [ChapterApiController::class, 'single_chapter_page']);
        Route::post('get-video-lesson', [ChapterApiController::class, 'video_page']);

        Route::get('get-boards', [UserApiController::class, 'allboards']);
        Route::get('get-classes', [UserApiController::class, 'allclasses']);
        Route::get('logout-user', [UserApiController::class, 'logoutUser']);
        Route::post('user-data', [UserApiController::class, 'userData']);
        
        Route::post('profile-update', [UserApiController::class, 'updateProfile']);
        Route::get('profile-data', [UserApiController::class, 'getProfie']);

        

        Route::post('bookmark', [BookmarkApiController::class, 'boormark']);
        Route::get('get-bookmark', [BookmarkApiController::class, 'get_bookmark']);


    });
});
