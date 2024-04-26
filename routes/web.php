<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  *///da mora da bude logovan i da bude verifikovan

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/genre',[GenreController::class, 'index'])->name('genre.index');
    Route::get('/genre/create',[GenreController::class, 'create'])->name('genre.create');
    Route::post('/genre',[GenreController::class, 'store'])->name('genre.store');

    Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])
    ->name('genre.edit');

    Route::put('/genre/{genre}', [GenreController::class, 'update'])
    ->name('genre.update');

    Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])
    ->name('genre.destroy');

   // Route::post('/film', [FilmController::class, 'index'])->name('film.index');
    

});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('film', FilmController::class);
    Route::resource('person', PersonController::class);
   

});
//Route::resource('film', FilmController::class)->middleware(['auth','admin']);


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

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
