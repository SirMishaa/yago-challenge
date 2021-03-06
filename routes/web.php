<?php

use App\Http\Controllers\QuoteController;
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
   return redirect()->route('quote.form');
});

Route::get('/rc-pro/quote', [QuoteController::class, 'renderForm'])->name('quote.form');
Route::post('/rc-pro/quote', [QuoteController::class, 'handleForm']);
Route::get('/rc-pro/quote/{id}', [QuoteController::class, 'renderQuote'])->name('quote.summary');
