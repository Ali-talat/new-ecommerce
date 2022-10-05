<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\productPriceRequest;
use App\Http\Requests\productStockRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('id','DESC')->paginate(10);
        return \view('admin.Product.general.index',\compact('products'));
    }

    public function create(){
        
        $categories = Category::Active()->select('id')->get();
        $brands = Brand::Active()->select('id')->get();
        $tags = Tag::select('id')->get();

        return view('admin.Product.general.create',\compact(['categories','tags','brands']));
    }

    public function store(GeneralProductRequest $request){
      
        try{
            DB::beginTransaction();

            if(!$request->has('is_active')){
                $request->request->add(['is_active'=>0]);
            }else{
                $request->request->add(['is_active'=>1]);
            }
            $slug = \explode(' ' ,$request->name);
            $slug = implode('-' , $slug);
            $request->request->add(['slug'=> $slug]);
            
            
            
            $Product= Product::create($request->except('_token'));
            $Product -> name = $request->name ;
            $Product -> description = $request->description ;
            $Product -> short_description = $request->short_description ;
            $Product->save();
            $Product-> categories() ->attach($request->categories);
            $Product->tags() -> attach($request->tags);
            DB::commit();
            return redirect()->route('product.index')->with(['success' => 'تم الحفظ بنجاح']);

        }catch(Exception $ex){
            return $ex ;
            DB::rollback();
            return redirect()->route('product.index')->with(['error' => 'حدث خطا ما يرجي المحاوله لاحقا']);

        }

        
    }

    public function createPrice($id){

        return \view('admin.product.price.create',\compact('id'));
    }

    public function storePrice(productPriceRequest $request ,$id){
        try{

            $prodect = Product::find($id);
            $prodect ->update($request->except('_token'));
            return redirect()->route('product.index')->with(['success' => 'تم التحديث  بنجاح']);
        }catch(Exception $ex){
            return redirect()->route('product.index')->with(['error' => 'حدث خطا ما يرجي المحاوله لاحقا']);

        }


    }
    public function createStock($id){
        $product = Product::find($id);
        return \view('admin.product.stock.create',\compact(['id','product']));
    }

    public function storeStock(productStockRequest $request ,$id){
        try{
            $prodect = Product::find($id);

        if(!$prodect){
            return \redirect()->route('product.index')->with(['error' => 'عفوا هذا المنتج غير موجود']);
        }
            $prodect->update($request->except('_token'));
            return redirect()->route('product.index')->with(['success' => 'تم التحديث  بنجاح']);

        }catch(Exception $ex){
            
            return redirect()->route('product.index')->with(['error' => 'حدث خطا ما يرجي المحاوله لاحقا']);

        }
    }

    public function createimage($id){
        
        $imgs = Image::where('product_id',$id)->get(); 
        
        return \view('admin.product.image.create',\compact(['imgs','id']));
    }

    public function saveImage (Request $request , $id){
        
        $file = $request ->file('dzfile');
        $fileName = uploadImage('products',$file);

        return \response()->json([
            'name'=>$fileName,
            'original_name' => $file ->getClientOriginalName()
        ]);

    }


    public function storeImage (Request $request , $id){
        if($request->has('documents') ){
            foreach($request->documents as $img){
                Image::create([
                    'product_id'=> $id ,
                    'photo'=> $img,
                ]);
            }
            return redirect()->route('product.index')->with(['success' => 'تم التحديث  بنجاح']);

        }
    }




    public function edit( $id){

        $Product = Product::find($id);
        return \view('admin.Product.edit',\compact('Product'));
    }



    public function update(Request $request , $id){
        

        try{
          $Product = Product::find($id);

          

        if (!$Product)
            return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
            
            DB::beginTransaction();
        
        $Product->update($request->all());
        
        
        //save translations

        $Product->name = $request->name ;
        $Product->save();
        // DB::table('Product_translations')
        //     ->where("Product_id",  $id)
        //     ->limit(1)
        //     ->update(['name'=> $request->name ]);
        
        DB::commit();


        return redirect()->route('Product.index')->with(['success' => 'تم ألتحديث بنجاح']);
    }catch (Exception $ex) {
        DB::rollback();
        return redirect()->route('Product.edit')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }

    }



    public function delete($id){

        try{

            $Product = Product::find($id);
    
            if (!$Product)
                    return redirect()->route('Product.index')->with(['error' => 'هذا القسم غير موجود ']);
    
            $Product->delete();
            return redirect()->route('Product.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch(Exception $ex){
            return redirect()->route('Product.index')->with(['error' => 'حدث مشكله ما يرجي المحاوله لاحقا ']);


        }

    }
}
