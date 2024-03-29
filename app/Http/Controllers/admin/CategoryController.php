<?php

namespace App\Http\Controllers\admin;

use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    public function index(){

        
        $locale = LaravelLocalization::getCurrentLocale() ;
         $categories = Category::orderBy('id','DESC')->paginate(10);
         return \view('admin.category.index',\compact('categories','locale'));
         
        
    }

    public function create(){

        $categories = Category::select('id','parent_id')->get();

        return view('admin.category.create',\compact('categories'));
    }

    public function store(categoryRequest $request){

        if(!$request->has('is_active')){
            $request->request->add(['is_active'=>0]);
        }else{
            $request->request->add(['is_active'=>1]);
        }
        $slug = \explode(' ' ,$request->name);
        $slug = implode('-' , $slug);
        $request->request->add(['slug'=> $slug]);
        
        if($request->type == CategoryType::Maincategory){
            $request->request->add(['parent_id'=> null]);

        }
        $fileName = "";
        if ($request->has('photo')) {

            $fileName = uploadImage('categories', $request->photo);
        }
        

        $category= Category::create($request->except('_token'));
        $category -> name = $request->name ;
        $category->photo = $fileName;
        $category->save();
        return redirect()->route('category.index')->with(['success' => 'تم الحفظ بنجاح']);

        
    }



    public function edit( $id){

        $category = Category::find($id);
        $mainCats = Category::all();
        return \view('admin.category.edit',\compact('category','mainCats'));
    }



    public function update(categoryRequest $request , $id){

        

        try{
          $category = Category::find($id);

          

        if (!$category)
            return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);
            
            DB::beginTransaction();
        
        $category->update($request->all());
        
        if ($request->has('photo')) {
            $img = $category->photo;
            $img= Str::after($img, 'categories/');
            Storage::disk('categories')->delete($img);
            $fileName = uploadImage('categories', $request->photo);
            Category::where('id', $id)
                ->update([
                    'photo' => $fileName,
                ]);
            
        }
        //save translations

        $category->name = $request->name ;
        $category->save();
        // DB::table('category_translations')
        //     ->where("category_id",  $id)
        //     ->limit(1)
        //     ->update(['name'=> $request->name ]);
        
        DB::commit();


        return redirect()->route('category.index')->with(['success' => 'تم ألتحديث بنجاح']);
    }catch (Exception $ex) {
        DB::rollback();
        return redirect()->route('category.edit')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }

    }



    public function delete($id){

        try{
            $cat = Category::find($id);
            if(!$cat){
                return \redirect()->back()->with(['error'=>'هذا القسم غير موجود']);

            }
            $cat ->delete();   
            return \redirect()->back()->with(['success'=>'تم الحذف بنجاح']);

        }catch(Exception $ex){
            return redirect()->route('category.index')->with(['error' => 'حدث مشكله ما يرجي المحاوله لاحقا ']);


        }

    }
}
