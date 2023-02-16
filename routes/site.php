<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\homeController;
use App\Http\Livewire\Site\CartComponent;
use App\Http\Livewire\Site\CategoryComponent;
use App\Http\Livewire\Site\CheckoutComponent;
use App\Http\Livewire\Site\Homepage;
use App\Http\Livewire\Site\ProductComponent;
use App\Http\Livewire\Site\ShopComponent;
use App\Http\Livewire\Site\ThanckyouComponent;
use App\Http\Livewire\Site\WishlistComponent;
use Illuminate\Support\Facades\Auth;
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

        Route::get('/',Homepage::class)->name('homepage');
        Route::get('shop',ShopComponent::class)->name('shop');
        Route::get('cart',CartComponent::class)->name('cart');
        Route::get('addToCart/{id}',[CartComponent::class ,'addtocart'])->name('add.to.cart');
        Route::get('category/{sulg}',[CategoryComponent::class ,'productBySulg'])->name('category.slug');
        Route::get('product/{slug}',[ProductComponent::class,'productBySulg'])->name('product.slug');

                    ################## wishlist##################
        Route::group(['prefix'=>'wishlist' , 'middleware'=>'auth'],function(){
            Route::get('index',[WishlistComponent::class,'index'])->name('index.wishlist');
            Route::post('store',[WishlistComponent::class,'store'])->name('store.wishlist');
            Route::get('delete',[WishlistComponent::class,'destroy'])->name('delete.wishlist');
        });

        Route::group(['prefix'=>'checkout' , 'middleware'=>'auth'],function(){
            Route::get('/',CheckoutComponent::class)->name('checkout');
            Route::get('thankyou',ThanckyouComponent::class)->name('thankyou');
            // Route::get('order_now',[CheckoutComponent::class,'checkout'])->name('order.now');

        });
        



        
    });


