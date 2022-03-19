<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\VacancyCandidateController;

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
Route::get("/upload", function () {
    return view("online-application.upload");
})->name("upload_application");
Route::get("/upload/file/{user}",[VacancyCandidateController::class,"create"])->name('vacancy_upload');
Route::post("/upload",[VacancyCandidateController::class,"store"])->name('vacancy_personal_detail');
Route::post("/upload/file/{user}",[VacancyCandidateController::class,"upload_store"])->name('vacancy_upload_file_store');
Route::get("upload/complete/{user}",[VacancyCandidateController::class,"complete"])->name("vacancy_complete");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/personal", function() {
    return view("online-application.personal");
})->name("personal_info");


