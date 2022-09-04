<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function editShipping($type){
        
        if ($type == 'free'){
            $shippingFree = Setting::where('key','free_shipping_label')->first();

        }elseif($type == 'inner'){
            $shippingFree = Setting::where('key','local_label')->first();

        }elseif($type == 'outer'){
            $shippingFree = Setting::where('key','outer_label')->first();
        }else{
           $shippingFree = Setting::where('key','free_shipping_label')->first();

        }

        return \view('admin.setting.shipping',compact('shippingFree'));
        
    }

    public function updateShipping(SettingRequest  $request ,$id){
        try{

            $setting = Setting::find($id);
            DB::beginTransaction();
            $setting ->update($request->all());
            $setting ->value = $request->value ;
            $setting ->save();
            DB::commit();

            return \redirect()->back()->with(['success'=>'تم التحديث بنجاح ']);
            


        }catch(Exception  $ex){
            DB::rollback();
            return \redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
        }
        

    }
}
