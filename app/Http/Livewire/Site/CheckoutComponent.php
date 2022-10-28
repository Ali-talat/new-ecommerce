<?php

namespace App\Http\Livewire\Site;

use App\Models\User;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $ship_to_deffrint ;

    
    public function render()
    {
        return view('livewire.site.checkout-component');
    }
}
