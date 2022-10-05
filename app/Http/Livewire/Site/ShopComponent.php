<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class ShopComponent extends Component
{

    public function add(){
        return 'add' ;
    }
    public function render()
    {
     

        return view('livewire.site.shop-component');
    }
}
