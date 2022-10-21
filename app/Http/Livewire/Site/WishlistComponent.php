<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class WishlistComponent extends Component
{

    public function index(){
      
        $products = \Auth()->user()->wishlist()->latest()->get();
        return \view('livewire.site.wishlist-component',\compact('products'));
    
       
    
        
      }
        public function store(){
          
          if(!auth()->user()->inWishlist(request('productId'))){
            auth()->user()->wishlist()->attach(request('productId'));
            return \response()->json([
              'status'=> true,
              'msg'=>'added succsfuly'
            ]);
          };
          
          return \response()->json([
            'status'=> false,
            'msg'=>'added before'
        ]);
    
          
        }
    
    
        public function destroy(){
          auth()->user()->wishlist()->detach(request('productId'));
          return \redirect()->back();
        }


    public function render()
    {
        return view('livewire.site.wishlist-component');
    }
}
