<?php

namespace App\Http\Livewire\Site;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SearchingComponent extends Component
{

    public $query ;
    public $category ;
    public $catsSearch ;
    // public function add(){
    // }
    // public function mount(Request $request){

    //     $this->query = $request->input('search');
    //     $this->category = Category::all();
    //     $this->catsSearch = Category::where(function($q){
    //         $q->where('slug', 'LIKE', "%$this->query%");
    //     })
    //     ->orWhereHas('products',function($qq){
    //         $qq->where('slug', 'LIKE', "%$this->query%");

    //     })->get();
    //     return $this->catsSearch ;
    // }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $catsSearch = Product::where(function($q)use($query){
            $q->where('slug', 'LIKE', "%$query%");
        })
        ->orWhereHas('categories',function($qq)use( $query){
            $qq->where('slug', 'LIKE', "%$query%");

        })->get();
        
        $category = Category::all();
        
        return view('livewire.site.search-component', compact('catsSearch','category'));
    }

    public function render()
    {
        return view('livewire.site.searching-component');
    }
}
