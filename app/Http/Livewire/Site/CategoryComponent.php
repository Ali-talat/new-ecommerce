<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $num = 5 ;
    public function productBySulg($slug){
        $data = [];
  
  
            $data['category'] = Category::where('slug',$slug)->first();
  
          if($data['category']){
               $data['products'] = $data['category'] ->products ;
          }
          return view('livewire.site.category-component',$data);

    }

    public function add(){

        return \redirect()->route('homepage');

    }

    public function render()
    {
        
        return view('livewire.site.category-component');
    }

    
}
