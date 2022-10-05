<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $attributes = Attribute::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return \view('admin.attribute.index' ,\compact('attributes'));


    }

    public function create(){
        return \view('admin.attribute.create');
    }

    public function store(AttributeRequest $request){
        

        $attribute = Attribute::create([]);
        $attribute->name = $request->name ;
        $attribute ->save();
        return \redirect()->route('attribute.index')->with(['success'=>'تم الحفظ بنجاح']);
    }

    public function edit($id){
        $attribute = Attribute::find($id);
        return \view('admin.attribute.edit',\compact('attribute'));
    }

    public function update(AttributeRequest $request ,$id){
        
        $attribute = Attribute::find($id);
        if(!$attribute){
        return \redirect()->route('attribute.index')->with(['error'=>'هذا العنصر غير موجود']);

        }
        $attribute->name = $request->name ;
        $attribute ->save();
        return \redirect()->route('attribute.index')->with(['success'=>'تم الحفظ بنجاح']);
    }

    

    public function delete($id){
        $attribute = Attribute::find($id);
        if(!$attribute){
        return \redirect()->route('attribute.index')->with(['error'=>'هذا العنصر غير موجود']);

        }
        $attribute->Translation->delete();
        $attribute->delete();
        return \redirect()->route('attribute.index')->with(['success'=>'تم الحذف بنجاح']);
        
    }
}
