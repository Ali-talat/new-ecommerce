<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class DetailComponent extends Component
{

    // public function productDetail($slug){

    //     $product = Product::where('slug',$slug)->first();
        
    // }

    public $slug  ;
    public $product  ;
    public $imgs  ;
    public $related_products  ;

    public function mount()
    {
        $this->product = Product::where('slug',$this->slug)->first();

         $this->imgs = $this->product->images;
         $this->related_products = $this->product->categories ;
        //  $this->categories = $this->product->categories;
        foreach($this->product->categories as $category){
            $id = $category->id ;
    
            $c = Category::find($id);
            $this->related_products = $c->products;
           
    
           }
    }

    // public function productDetail($slug){

    //     $product = Product::where('slug',$slug)->first();

       

      
       
    // //    return $product->categories;
    //    foreach($product->categories as $category){
    //     $id = $category->id ;

    //     $c = Category::find($id);
    //     return $c->products;
       

    //    }
    //    return  Category::with(['products'=>function($query){
    //         $query->select('slug');
    //     }])->get();
    //    foreach($category->products as $product){
        
       
    //        return $product;

    //    }
         

        // return Product::with(['categories'=>function($query){
        //     $query->select('category_id');
        // }])->get();

        // Category::with(['products'=>function($query)use($product){
        //     $query->where('category_id',44);
        // }])->get();
       

        // $value = $product->categories ;
        // return $value ; // Specify the value you want to filter by

        // $products = Product::whereHas('pivotTable', function ($query) use ($value) {
        //     $query->where('category_id', $value); // Replace 'column_name' with the actual column name in your pivot table
        // })->get();
    //     return view('livewire.site.detail-component',\compact('product','imgs','options'));

    // }






    // public function increase($rowId){
    //     $product = Cart::get($rowId);
    //     $qty = $product->qty + 1;
    //     Cart::update($rowId, $qty);
       
    // }


    // public function decrease($rowId){
    //     $product = Cart::get($rowId);
    //     $qty = $product->qty - 1;
    //     Cart::update($rowId, $qty);
       
    // }

    public function render()
    {


        return view('livewire.site.detail-component');
    }


    

}
