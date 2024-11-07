<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', function () {
    return phpinfo();
});

//
//Route::get('/', function () {
//    return null;
//});
//
//Route::get('/test', function () {
//    return 1;
//});
