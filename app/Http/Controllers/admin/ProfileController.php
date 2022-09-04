<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile($id){
        try{

            $admin = Admin::find($id);
    
            if(!$admin){
                return \redirect()->back()->with(['error' => 'عذرا هذا المستخدم غير موجود']);
     
            }else{
                return \view('admin.profile.edit',\compact('admin'));
            }
        }catch(Exception $ex){
            return \redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }
    }

    public function updateProfile(AdminProfileRequest $request , $id){
        
       
        try{

            $admin = Admin::find($id);
            if(!$request->filled('password')){
                unset($request['password']);
                
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin->update($request->all());
            return \redirect()->back()->with(['success' => 'تم التحديث بنجاح ']);


        }catch(Exception $ex){

            return \redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }
        
            
        
            

        

    }
}
