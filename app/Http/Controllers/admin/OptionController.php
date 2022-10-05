<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class OptionController extends Controller
{

    public function index()
    {
        $options = Option::orderBy('id', 'DESC')->paginate(10);
        return view('admin.options.index', compact('options'));
    }

    public function create($product_id)
    {
        // $products = Product::active()->select('id')->get();
    //    return $product_id = Product::find($id);

        $attributes = Attribute::select('id')->get();
        return view('admin.options.create',\compact(['attributes','product_id']));
    }


    public function store(OptionRequest $request )
    {


        DB::beginTransaction();


        $option = Option::create($request->except('_token'));

        //save translations
        $option->name = $request->name;
        $option->save();
        DB::commit();
        return redirect()->route('product.option.index')->with(['success' => 'تم ألاضافة بنجاح']);



    }


    public function edit($id)
    {

        //get specific categories and its translations
        $option = Option::find($id);
        $products = Product::active()->select('id')->get();
        $attributes = Attribute::select('id')->get();


        if (!$option)
            return redirect()->route('product.option.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('admin.options.edit', compact(['option','products','attributes']));

    }


    public function update($id, OptionRequest $request)
    {
        try {
            //validation

            //update DB
            


            $option = Option::find($id);
            

            if (!$option)
                return redirect()->route('product.option.index')->with(['error' => 'هذا الماركة غير موجود']);


            DB::beginTransaction();
            

            

            $option->update($request->except('_token'));

            // save translations
            // DB::table('option_translations')
            // ->where("id",  $id)
            // ->limit(1)
            // ->update(['name'=> $request->name ]);
            $option->name = $request->name ;
            $option ->save();

            DB::commit();
            return redirect()->route('product.option.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('product.option.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function delete($id)
    {
        try {
            //get specific categories and its translations
            $option = Option::find($id);
            

            if (!$option)
                return redirect()->route('admin.product.options')->with(['error' => 'هذا الماركة غير موجود ']);

            $option->Translation->delete();
            $option->delete();
            // $img = $option->photo;
            // $img= Str::after($img, 'options/');
            // Storage::disk('options')->delete($img);

            return redirect()->route('option.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('option.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
