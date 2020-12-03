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

Route::middleware('auth:web')->group(function(){
    Route::get('/', 'HomeController@index');

    Route::post('/therapy/create', 'TherapyController@storeTherapy')->name('therapy.create');
    Route::get('/exercise', 'ExerciseController@index')->name('exercise');
    Route::post('/exercise/create', 'ExerciseController@storeExercise')->name('exercise.create');
    Route::get('/list/user', 'UserController@index')->name('list.user');
    Route::get('/assignment/{id}', 'AssignmentController@index')->name('assignment');
    Route::post('/asignment/{id}/store', 'AssignmentController@storeAssignment')->name('assignment');
    Route::get('/workout/{id}', 'WorkoutController@index')->name('workout');
    Route::post('/workout/{id}/store', 'WorkoutController@storeWorkout')->name('workout');
    Route::get('/selection/therapy', 'TherapyController@selectionTherapy')->name('selection.therapy');
    Route::get('/selection/exercise', 'ExerciseController@selectionExercise')->name('selection.exercise');
    Route::get('/selection/exercise/vista', 'ExerciseController@exercise')->name('selection.exercise.vista');
    Route::get('/selection/favorite', 'AssignmentController@addFavorite')->name('selection.favorite');
    Route::get('/selection/workout', 'WorkoutController@selectionWorkout')->name('selection.workout');

    Route::post('/playback/store', 'PlaybackController@store')->name('playback.store');

    Route::get('/ajaxRequest', 'AjaxController@ajaxRequest');
    Route::post('/ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
});

Auth::routes();

Route::post('/login', 'Auth\LoginController@authenticate');

/*Route::get('/', function () {
    return view('auth.login');
});*/



