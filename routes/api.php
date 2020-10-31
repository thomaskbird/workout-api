<?php

date_default_timezone_set('America/Detroit');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\UserToken;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ExerciseController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


route::post('login', [AuthenticationController::class, 'action_login']);
//route::post('signup', [AuthenticationController::class, 'action_signup']);
//route::post('activate/{activation_code}', [AuthenticationController::class, 'account_user_activate']);
//route::post('forgot-password', [AuthenticationController::class, 'action_forgot_password']);
//route::post('reset-password/{reset_token}', [AuthenticationController::class, 'action_reset_password']);

route::middleware([UserToken::class])->group(function() {
    route::post('exercise/add', [ExerciseController::class, 'add']);
});