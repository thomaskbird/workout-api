<?php

date_default_timezone_set('America/Detroit');

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\UserToken;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExerciseStepController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutExerciseController;

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

route::middleware(['apiToken'])->group(function() {
    route::post('exercise/add', [ExerciseController::class, 'exercise_add']);
    route::get('exercises', [ExerciseController::class, 'exercise_list']);
    route::get('exercises/{id}', [ExerciseController::class, 'exercise_single']);

    route::post('exercise/step/add', [ExerciseStepController::class, 'exercise_step_add']);

    route::post('workout/add', [WorkoutController::class, 'workout_add']);
    route::get('workouts', [WorkoutController::class, 'workout_list']);
    route::get('workouts/{id}', [WorkoutController::class, 'workout_single']);

    route::post('workouts/exercises/add', [WorkoutExerciseController::class, 'add']);
    route::post('workouts/exercises/remove/{id}', [WorkoutExerciseController::class, 'remove']);
});