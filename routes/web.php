<?php

use App\Http\Controllers\UserController;
use App\Models\catalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\mailController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;


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

// Route::get('/catalog', function () {
//     return view('catalog');
// });

Route::get('/About', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'autentikasi']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/balas/{balas}', [mailController::class, 'index'])->name('mails.index')->middleware([adminMiddleware::class]);
Route::post('/kirim', [mailController::class, 'kirim'])->name('mails.kirim')->middleware([adminMiddleware::class]);

Route::resource('/profile', ProfileController::class)->middleware([adminMiddleware::class]);
Route::put('/reset/{profile}', [ProfileController::class, 'reset'])->name('reset')->middleware([adminMiddleware::class]);

Route::resource('/admin', CatalogController::class, ['as' => 'Catalog'])->middleware([adminMiddleware::class]);
Route::resource('/message', MessageController::class)->middleware([adminMiddleware::class]);
Route::Post('/message-delete', [MessageController::class, 'deletecek'])->name('deletecek')->middleware([adminMiddleware::class]);

Route::get('/reload-captcha', [MessageController::class, 'reloadCaptcha']);

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/catalog/{show}', [UserController::class, 'show'])->name('user.show');