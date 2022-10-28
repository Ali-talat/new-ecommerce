<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use Livewire\Component;

class Homepage extends Component
{
    public $num = 2 ;

    public function productBySulg($slug){


        $data = [];
  
  
            $data['category'] = Category::where('slug',$slug)->first();
  
          if($data['category']){
               $data['products'] = $data['category'] ->products ;
          }
          return view('livewire.site.category-component',$data);

    }

    
    
    public function render()
    {
    
       $sliders = Slider::get('photo');
       
        return view('livewire.site.homepage',\compact('sliders'));
    }

    
}
