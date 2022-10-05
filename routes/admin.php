<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\Auth\AuthenticatedSessionControllerAdmin;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminLogin;
use App\Http\Livewire\Admin\Teste;
use App\Http\Livewire\Test;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';




Route::group(
    [
        'prefix' =>LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 



        Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function(){
            Route::get('/dashboard',[AdminDashboard::class,'render'])->name('admin.dashboard');
            Route::get('/logout',[AuthenticatedSessionControllerAdmin::class,'destroy'])->name('admin.logout');
        ###################### start setting route ##########

            Route::group(['prefix'=>'setting'],function(){
                
                Route::get('/shipping/{type}',[SettingController::class,'editShipping'])->name('shipping.edit');
                Route::post('/shipping/{id}',[SettingController::class,'updateShipping'])->name('shipping.update');
    
    
            });

        ###################### end setting route ##########


            ###################### start profile route ##########


            Route::group(['prefix'=>'profile'],function(){
                
                Route::get('/edit/{id}',[ProfileController::class,'editProfile'])->name('profile.edit');
                Route::post('/update/{id}',[ProfileController::class,'updateProfile'])->name('profile.update');

            });

             ###################### end profile route ##########

             ###################### start categorys route ##########

            Route::group(['prefix'=>'category'],function(){
                
                Route::get('/',[CategoryController::class,'index'])->name('category.index');
                Route::get('/create',[CategoryController::class,'create'])->name('category.create');
                Route::post('/store',[CategoryController::class,'store'])->name('category.store');
                Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
                Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
                Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


            });
             ###################### end categorys route ##########


              ###################### start brands route ################################

            Route::group(['prefix'=>'brands'],function(){
                
                Route::get('/',[BrandsController::class,'index'])->name('brand.index');
                Route::get('/create',[BrandsController::class,'create'])->name('brand.create');
                Route::post('/store',[BrandsController::class,'store'])->name('brand.store');
                Route::get('/edit/{id}',[BrandsController::class,'edit'])->name('brand.edit');
                Route::post('/update/{id}',[BrandsController::class,'update'])->name('brand.update');
                Route::get('/delete/{id}',[BrandsController::class,'delete'])->name('brand.delete');


            });
             ###################### end brands route ##################################


             ###################### start tags route ################################

            Route::group(['prefix'=>'tag'],function(){
                
                Route::get('/',[TagController::class,'index'])->name('tag.index');
                Route::get('/create',[TagController::class,'create'])->name('tag.create');
                Route::post('/store',[TagController::class,'store'])->name('tag.store');
                Route::get('/edit/{id}',[TagController::class,'edit'])->name('tag.edit');
                Route::post('/update/{id}',[TagController::class,'update'])->name('tag.update');
                Route::get('/delete/{id}',[TagController::class,'delete'])->name('tag.delete');


            });
             ###################### end tags route ##################################


             ###################### start products route ##################################


             Route::group(['prefix'=>'product'],function(){
                
                Route::get('/',[ProductController::class,'index'])->name('product.index');
                Route::get('/create',[ProductController::class,'create'])->name('product.create');
                Route::post('/store',[ProductController::class,'store'])->name('product.store');

                Route::get('/create/price/{id}',[ProductController::class,'createPrice'])->name('product.price.create');
                Route::post('/store/price/{id}',[ProductController::class,'storePrice'])->name('product.price.store');
                Route::get('/create/stock/{id}',[ProductController::class,'createStock'])->name('product.stock.create');
                Route::post('/store/stock/{id}',[ProductController::class,'storeStock'])->name('product.stock.store');
                Route::get('/create/image/{id}',[ProductController::class,'createimage'])->name('product.image.create');
                Route::post('/save/image/{id}',[ProductController::class,'saveImage'])->name('product.image.save');
                Route::post('/store/image/{id}',[ProductController::class,'storeImage'])->name('product.image.store');

                Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
                Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
                Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

                Route::group(['prefix'=>'option'],function(){
                
                    Route::get('/',[OptionController::class,'index'])->name('product.option.index');
                    Route::get('/create/{id}',[OptionController::class,'create'])->name('product.option.create');
                    Route::post('/store',[OptionController::class,'store'])->name('product.option.store');
                    Route::get('/edit/{id}',[OptionController::class,'edit'])->name('product.option.edit');
                    Route::post('/update/{id}',[OptionController::class,'update'])->name('product.option.update');
                    Route::get('/delete/{id}',[OptionController::class,'delete'])->name('product.option.delete');
                    
    
    
                });


            });
             ###################### end products route ##################################


             ###################### start attribute route ##################################


            Route::group(['prefix'=>'attribute'],function(){
                
                Route::get('/',[AttributeController::class,'index'])->name('attribute.index');
                Route::get('/create',[AttributeController::class,'create'])->name('attribute.create');
                Route::post('/store',[AttributeController::class,'store'])->name('attribute.store');
                Route::get('/edit/{id}',[AttributeController::class,'edit'])->name('attribute.edit');
                Route::post('/update/{id}',[AttributeController::class,'update'])->name('attribute.update');
                Route::get('/delete/{id}',[AttributeController::class,'delete'])->name('attribute.delete');


            });
             ###################### end attribute route ##################################


            Route::group(['prefix'=>'option'],function(){
                
                Route::get('/',[OptionController::class,'index'])->name('option.index');
                Route::get('/create/{id}',[OptionController::class,'create'])->name('option.create');
                Route::post('/store',[OptionController::class,'store'])->name('option.store');
                Route::get('/edit/{id}',[OptionController::class,'edit'])->name('option.edit');
                Route::post('/update/{id}',[OptionController::class,'update'])->name('option.update');
                Route::get('/delete/{id}',[OptionController::class,'delete'])->name('option.delete');


            });





        });



        


        Route::get('admin/login',[AuthenticatedSessionControllerAdmin::class,'create'])->name('admin.login');
        Route::post('admin/login',[AuthenticatedSessionControllerAdmin::class,'store'])->name('admin.post.login');
        Route::get('admin/logout',[AuthenticatedSessionControllerAdmin::class,'logout'])->name('admin.logout');
        


    });