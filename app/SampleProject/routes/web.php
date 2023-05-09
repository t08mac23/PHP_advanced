<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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
    return view('casteria');
})->name('casteria');

//入力フォームページ
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');

//確認フォームページ
Route::post('/contact/confirm', [ContactsController::class, 'confirm'])->name('confirm');
// ダイレクトアクセスの禁止
Route::get('/contact/confirm', function () {
    return redirect('/contact');
});

//送信完了ページ
Route::post('/contact/complete', [ContactsController::class, 'complete'])->name('complete');
// ダイレクトアクセスの禁止
Route::get('/contact/complete', function () {
    return redirect('/contact');
});