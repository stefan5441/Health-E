<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateDoctorsController;

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

Route::get('/search', 
'App\Http\Controllers\UserController@search')->name('search');

Route::view('/', 'welcome')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/help', 'help')->name('help');

Route::get('/mk', function(){
    App::setlocale('mk');
    return view('welcome');
})->name('mk');

Route::get('/en', function(){
    App::setlocale('en');
    return view('welcome');
})->name('en');

Route::get('/results/mk', function(){
    App::setlocale('mk');
    return view('results');
})->name('resmk');

Route::get('/results/en', function(){
    App::setlocale('en');
    return view('results');
})->name('resen');