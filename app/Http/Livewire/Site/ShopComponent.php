<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{

    
    public function render()
    {
        $category = Category::all();
        $products = Product::all();
        return view('livewire.site.shop-component',\compact(['category','products']));
    }
}
