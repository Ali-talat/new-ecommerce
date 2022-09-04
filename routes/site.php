<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\homeController;
use App\Http\Livewire\Site\CartComponent;
use App\Http\Livewire\Site\CheckoutComponent;
use App\Http\Livewire\Site\Homepage;
use App\Http\Livewire\Site\ShopComponent;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('home',[homeController::class,'index']);

                
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        Route::get('/',[Homepage::class,'render'])->name('homepage');
        Route::get('shop',[ShopComponent::class,'render'])->name('shop');
        Route::get('checkout',[CheckoutComponent::class,'render'])->name('checkout');
        Route::get('cart',[CartComponent::class,'render'])->name('cart');
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });


