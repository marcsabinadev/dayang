<?php

use App\Http\Controllers\Main;
use App\Models\Tournament;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('/', 'welcome') -> name('home'); 
Route::get('about', [Main::class, 'create'])-> name('about'); 
Route::post('store', [Main::class, 'store'])-> name('store');
Route::post('update', [Main::class, 'update'])-> name('update');
Route::delete('delete/{registration}', [Main::class, 'destroy'])-> name('delete');
Route::view('/personajes', 'personajes') -> name('personajes'); 
Route::view('/desarrolladores', 'desarrolladores') -> name('desarrolladores'); 
Route::view('/login', 'login') -> name('login'); 