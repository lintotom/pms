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

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('project', 'App\Http\Controllers\ProjectController');
    Route::resource('task', 'App\Http\Controllers\TaskController');
    Route::resource('timesheet', 'App\Http\Controllers\TimeSheetController');
    Route::get('project_report', 'App\Http\Controllers\ProjectReportController@index');
    Route::get('search_project', 'App\Http\Controllers\ProjectReportController@search_project');
});

require __DIR__.'/auth.php';
