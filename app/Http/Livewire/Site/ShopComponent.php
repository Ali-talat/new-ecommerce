<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{


    public $pagesize ;
    public $sorting ;
    
    public function mount(){

        $this->pagesize  = 12 ; 
        $this->sorting  = 'default' ; 
    }

    

    use WithPagination ;
    public function render()
    {
        if($this->sorting == 'date'){

        $products = Product::orderBy('created_at','desc')->paginate( $this->pagesize);

        }elseif($this->sorting == 'price'){

        $products = Product::orderBy('price','asc')->paginate( $this->pagesize);

        }elseif($this->sorting == 'price-desc'){

        $products = Product::orderBy('price','desc')->paginate( $this->pagesize);

        }else{
        $products = Product::paginate($this->pagesize);

        }

        $category = Category::all();
        return view('livewire.site.shop-component',\compact(['category','products']));
    }
}
