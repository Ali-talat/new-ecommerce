<?php

namespace App\Http\Livewire\Site;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{

    public function addtocart($id){

        $product = Product::find($id);

        if($product->special_price !== \null){
            $price = $product->special_price ;
        }else{
            $price = $product->price ;
        }
        
        Cart::add(
            $product->id,
            $product->name,
            1,
            $price ,
            
        );
        return \redirect()->route('cart');

    }

    public function increase($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
       
    }


    public function decrease($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
       
    }

    public function delete($rowId){

        Cart::remove($rowId);
    }

    public function setAmountForCheckout(){

        \session()->put('checkout',[

            'discount'=> 0 ,
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total'=> Cart::total()
        ]);

    }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.site.cart-component');
    }
}
