<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user',UserController::class);

Route::prefix('user')->group(function () {

    Route::post(
        'sign-up',[
            RegistrationController::class,
            'registration'
        ]
    );


    Route::post(
        'sign-in',[
            LoginController::class,
            'login'
        ]
    );

    Route::post('sign-out',[
        LoginController::class,
        'logout'
    ]);

    Route::post('refresh-token',[
        LoginController::class,
        'refresh'
    ]);

    Route::post('user-info',[
        LoginController::class,
        'me'
    ]);

    Route::post(
        'sign-in/with/facebook',[
            LoginController::class,
            'login_with_facebook'
        ]
    );

    Route::post(
        'sign-in/with/google',[
            LoginController::class,
            'login_with_google'
        ]
    );

});
