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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){

    Route::group(['prefix' => 'tech_reports'], function(){
        Route::resource('/', App\Http\Controllers\TechReportController::class);
        Route::get('/report/create', [App\Http\Controllers\TechReportController::class, 'createReport']);
        Route::post('/report/store', [App\Http\Controllers\TechReportController::class, 'store']);
        Route::get('/{id}/edit', [App\Http\Controllers\TechReportController::class, 'edit']);
        Route::post('/reports', [App\Http\Controllers\TechReportController::class, 'getReports']);
        Route::get('/charge', [App\Http\Controllers\TechReportController::class, 'toCharge']);
        Route::get('/search', [App\Http\Controllers\TechReportController::class, 'searchReport']);
        Route::get('/details', [App\Http\Controllers\TechReportController::class, 'getDetails']);
        Route::get('/update/{id}', [App\Http\Controllers\TechReportController::class, 'update']);
        Route::delete('delete/{id}', [App\Http\Controllers\TechReportController::class, 'destroy']);

        //charging routes
        Route::get('/charging', [App\Http\Controllers\TechReportController::class, 'charging']);
        Route::get('/charging/charges', [App\Http\Controllers\TechReportController::class, 'getCharges']);
    });

    Route::group(['prefix' => 'manage'], function(){
        //users
        Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
        Route::post('/users/create', [App\Http\Controllers\UserController::class, 'store']);
        Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/users/{id}/update', [App\Http\Controllers\UserController::class, 'update']);
        Route::delete('/users/{id}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
        Route::post('/users/reset-password', [App\Http\Controllers\UserController::class, 'resetPassword']);

        //department
        Route::get('/department', [App\Http\Controllers\DepartmentController::class, 'index']);
        Route::get('/department/list', [App\Http\Controllers\DepartmentController::class, 'getDepartment']);
        Route::post('/department/create', [App\Http\Controllers\DepartmentController::class, 'store']);
        Route::put('/department/{id}/update', [App\Http\Controllers\DepartmentController::class, 'update']);
    });


    Route::group(['prefix' => 'telephone'], function(){
        Route::get('/', [App\Http\Controllers\TelephoneController::class, 'index']);
    });

});
