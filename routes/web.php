<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/dashboard', function () {

    $response = Http::get('https://api.binance.com/api/v3/ticker/price?symbol=ETHUSDT');

    dd($response->json());

    //

    $user = Auth::user();

    $invoice = App\Models\Invoice::find(1);

    $user->notify(new App\Notifications\InvoicePaid($invoice));

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
