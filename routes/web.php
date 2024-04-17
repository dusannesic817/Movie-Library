<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  //da mora da bude logovan i da bude verifikovan

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/lang/{locale}', function (string $locale){
    if(isset($locale)){
        app()->setLocale($locale);
    }
   // App::setLocale($locale);

    session(['locale' => $locale]);

    return redirect()->back();
})->whereIn('locale', ['en','sr'])->name('lang'); //ovo nema sluzi da stavimo ime rute

require __DIR__.'/auth.php';

Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false
]

//postavio sam rute koje ce biti false jer se ne koriste


);

Route::get('/home', [HomeController::class, 'index'])->name('home');
