<?php

namespace App\Http\Livewire\Site;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class CheckoutComponent extends Component
{
    public $ship_to_deffrint ;
    public $paymentmode;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $city;
    public $country;
    public $zipcode;
    public $address;

    public $s_firstname ;
    public $s_lastname ;
    public $s_email ;
    public $s_phone ;
    public $s_city ;
    public $s_country ;
    public $s_zipcode ;
    public $s_address ;
    public $thankyou ;
    public $cart_no ;
    public $exp_month ;
    public $exp_year ;
    public $cvc ;

    public function checkout(){
        

            $this->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'city'=>'required',
                'country'=>'required',
                'zipcode'=>'required|numeric',
                'address'=>'required',
                'paymentmode'=>'required',

            ]);


            $order = Order::create([
                'user_id'=>Auth::user()->id,
                'subtotal'=>Cart::subtotal(),
                'total'=>Cart::total(),
                'tax'=>Cart::tax(),
                'descount'=>'0',
                'firstname'=>$this->firstname,
                'lastname'=>$this->lastname,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'city'=>$this->city,
                'country'=>$this->country,
                'zipcode'=>$this->zipcode,
                'address'=>$this->address,
                'status'=>'ordered',
                'ship_to_deffrint'=>$this->ship_to_deffrint ? 1:0,
            ]);

            foreach(Cart::content() as $item){
                OrderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'quantity'=>$item->qty,
                    'price'=>$item->price,
                ]);
            }

            if($this->ship_to_deffrint){

                $this->validate([
                    's_firstname'=>'required',
                    's_lastname'=>'required',
                    's_email'=>'required|email',
                    's_phone'=>'required|numeric',
                    's_city'=>'required',
                    's_country'=>'required',
                    's_zipcode'=>'required|numeric',
                    's_address'=>'required',
                ]);

                Shipping::create([
                    'order_id'=>$order->id,
                    'firstname'=>$this->s_firstname,
                    'lastname'=>$this->s_lastname,
                    'email'=>$this->s_email,
                    'phone'=>$this->s_phone,
                    'city'=>$this->s_city,
                    'country'=>$this->s_country,
                    'zipcode'=>$this->s_zipcode,
                    'address'=>$this->s_address,
                ]);


            }

            if($this->paymentmode == 'cod'){

                Transaction::create([
                    'user_id'=>Auth::user()->id,
                    'order_id'=>$order->id,
                    'mode'=> 'cod',
                    'status'=>'pending',

                ]);

                
            }
            // elseif($this->paymentmode == 'card'){

            //     $this->validate([
            //         'cart_no '=>'required|numrice',
            //         'exp_month '=>'required|numrice',
            //         'exp_year '=>'required|numrice',
            //         'cvc '=>'required|numrice',
            //     ]);

            //     $stripe = new \Stripe\StripeClient(
            //         \env('STRIPE_SECRET')
            //       );
            //       $stripe->tokens->create([
            //         'card' => [
            //           'number' => $this->cart_no,
            //           'exp_month' => $this->exp_month,
            //           'exp_year' => $this->exp_year,
            //           'cvc' => $this->cvc,
            //         ],
            //       ]);

            // }
            
            $this->thankyou = 1 ;
            Cart::destroy();
            session()->forget('checkout');
            if($this->thankyou){
                return \redirect()->route('thankyou');

            }
        
    }
    
    public function render()
    {
        return view('livewire.site.checkout-component');
    }

}
    

