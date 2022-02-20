<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    if (request()->download && request()->download == true) {
        // dd(Storage::get("public/application-form.pdf"));
        // dd(request()->all());
        return Storage::download('public/application-form.pdf','gnsmf-application-form.pdf');
    } 
    return view('index');
})->name("index");
