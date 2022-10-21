<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    

    public function create(){
        
        
        return \view('admin.sliders.create');
    }

    public function save(Request $request ){
        
        $file = $request ->file('dzfile');
        $fileName = uploadImage('sliders',$file);

        return \response()->json([
            'name'=>$fileName,
            'original_name' => $file ->getClientOriginalName()
        ]);

    }


    public function store(Request $request ){
        if($request->has('documents') ){
            foreach($request->documents as $img){
                Slider::create([
                    'photo'=> $img,
                ]);
            }
            return redirect()->route('slider.create')->with(['success' => 'تم الاضافه  بنجاح']);

        }
    }

}
