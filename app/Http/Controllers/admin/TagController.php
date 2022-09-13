<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\TagRequest;
use App\Models\Brand;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index()
    {
        $tags =Tag::orderBy('id', 'DESC')->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(TagRequest $request)
    {

        try{

        
            DB::beginTransaction();
            $tag = Tag::create($request->all());
            //save translations
            $tag->name = $request->name;
            $tag->save();
            DB::commit();
        
            return redirect()->route('tag.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('tag.index')->with(['error' => 'عفوا حدث مشكله ما يرجي المحاوله لاحقا']);
        }


    }


    public function edit($id)
    {

        //get specific categories and its translations
        $tag = Tag::find($id);

        if (!$tag)
            return redirect()->back()->with(['error' => 'هذا الماركة غير موجود ']);

        return view('admin.tags.edit', compact('tag'));

    }


    public function update($id, TagRequest $request)
    {
        try {
            //validation

            //update DB
            


            $tag = Tag::find($id);
            
            if (!$tag)
                return redirect()->route('tag.index')->with(['error' => 'هذا الماركة غير موجوده']);


            DB::beginTransaction();
            

            

            $tag->update($request->except('_token','id'));

         
            $tag->name = $request->name ;
            $tag ->save();

            DB::commit();
            return redirect()->route('tag.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('tag.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function delete($id)
    {
        try {
            //get specific categories and its translations
            $tag = tag::find($id);
            

            if (!$tag)
                return redirect()->route('tag.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $tag->delete();
            

            return redirect()->route('tag.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('tag.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
