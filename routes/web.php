<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    
    echo "hello world";
})->middleware('auth.basic'); */

Route::get('/login', function () {
    if(!Auth::check())
    {
      
     return view('login');
    }
    echo  "hello ".Auth::user()->name ;
});
Route::get('/register', function () {
    return view('register');
});

Route::get("logout",[LoginController::class,"logout"]);

Route::post('/authenticate', [LoginController::class,'authenticate']);
Route::post('/register', [RegisterController::class,'register']); 
