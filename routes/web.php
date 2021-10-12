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
    return redirect()->route('welcome', ['locale' => config('locale.default_locale')]);
}); 

// Localized routes
Route::group(['prefix' => '{locale}'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    
    Route::get('/example', [App\Http\Controllers\PageController::class, 'page'])
    ->name('example')
    ->defaults('page', 'example');    

    Route::get('/form', [App\Http\Controllers\ExampleFormController::class, 'view'])->name('example-form');
    Route::post('/form', [App\Http\Controllers\ExampleFormController::class, 'store']);
    Auth::routes();

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');