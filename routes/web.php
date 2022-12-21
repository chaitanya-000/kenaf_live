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
    return view('home');
});


Route::get('/shoppers', function () {
    return view('shoppers');
});

Route::get('/retailer', function () {
    return view('retailer');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});



//API////////////////

Route::post("/appverison","App\Http\Controllers\ApiController@appverison");
Route::post("/user","App\Http\Controllers\ApiController@user");
Route::post("/appuserregister","App\Http\Controllers\ApiController@appuserregister");
Route::post("/applogincheckusers","App\Http\Controllers\ApiController@applogincheckusers");


