<?php

namespace App\Http\Livewire\Site;

use App\Models\Attribute;
use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $num = 2 ;
    public function productBySulg($slug){
        $data = [];
  
            $data['product'] = Product::where('slug',$slug)->first();
            $product_categories_ids = $data['product'] ->categories ->pluck('id');
            
            $product_id = $data['product'] ->id ;
             $data['product_attr'] = Attribute::whereHas('options',function($q) use ($product_id) {
              $q ->whereHas('products',function($qq)  use ($product_id){
                $qq->where('product_id' , $product_id);
              });
            })->get();
  
            
           $data['related_products'] = Product::whereHas('categories',function ($cat) use($product_categories_ids){
            $cat-> whereIn('categories.id',$product_categories_ids);
        }) -> limit(20) -> latest() -> get();
  
          
          return view('livewire.site.product-component',$data);
      }
    public function render()
    {
        return view('livewire.site.product-component');
    }
}
