<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionControllerAdmin;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminLogin;
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


        });



        


        Route::get('admin/login',[AuthenticatedSessionControllerAdmin::class,'create'])->name('admin.login');
        Route::post('admin/login',[AuthenticatedSessionControllerAdmin::class,'store'])->name('admin.post.login');
        Route::get('admin/logout',[AuthenticatedSessionControllerAdmin::class,'logout'])->name('admin.logout');
        


    });