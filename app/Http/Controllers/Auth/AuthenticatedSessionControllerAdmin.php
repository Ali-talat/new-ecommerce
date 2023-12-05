<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionControllerAdmin extends Controller
{
    public function create()
    {
        if(\auth()->guard('admin')->check()){
            return \redirect()->route('admin.dashboard');
        }
        return view('livewire.admin.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(adminLoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false ;
        if(\auth()->guard('admin')->attempt(['email'=>$request->email , 'password'=>$request->password])){
            return redirect()->route('admin.dashboard');
        }else{
            return \redirect()->back()->with(['error'=>'هناك خطا بالبيانات']);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
       


        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
