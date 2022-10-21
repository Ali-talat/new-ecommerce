<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \view()->composer('layouts.app',function($view){
            $view->with('categories',Category::parent()->select('id','parent_id','slug')->with(['childrens' => function($q){
                $q ->select('id','slug','parent_id');
                $q -> with(['childrens'=> function($qq){
                $qq ->select('id','slug','parent_id');
    
                }]);
            }])->get());

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
