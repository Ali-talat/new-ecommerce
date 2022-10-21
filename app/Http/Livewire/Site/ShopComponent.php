<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use Livewire\Component;

class ShopComponent extends Component
{

    
    public function render()
    {
        $category = Category::all();
        return view('livewire.site.shop-component',\compact('category'));
    }
}
