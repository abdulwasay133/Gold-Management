<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client')->middleware('auth');
Route::get('/invoice', function (){
    return view('invoice');
})->name('invoice')->middleware('auth');

Route::get('/vendors', App\Livewire\Vendor::class, 'index')->name('vendors')->middleware('auth');
Route::get('/vendorledgers', App\Livewire\Vendorledgers::class, 'index')->name('vendorledgers')->middleware('auth');
Route::get('/vendordetail/{id}', App\Livewire\Vendordetail::class, 'index')->name('vendordetail')->middleware('auth');
Route::post('/findrecord', [App\Http\Controllers\PaymentController::class, 'findrecord'])->name('findrecord')->middleware('auth');


Route::get('/products', App\Livewire\Products::class, 'index')->name('product')->middleware('auth');
Route::get('/sale', App\Livewire\Productsale::class, 'index')->name('sale')->middleware('auth');
Route::get('/purchase', App\Livewire\Purchase::class, 'index')->name('purchase')->middleware('auth');
Route::get('/expense', App\Livewire\Expence::class, 'index')->name('expense')->middleware('auth');

Route::get('/paymentledger', App\Livewire\Pymentledgers::class, 'index')->name('paymentledger')->middleware('auth');

