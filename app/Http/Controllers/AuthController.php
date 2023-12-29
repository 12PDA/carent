<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function login(){
        return view('auth.login_page');
    }

    public function proses_login(Request $request){
        $credentials = $request->validate([
            'email'      => 'required|',
            'password'  => 'required|min:6'
        ],
        [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Password minimal 6 karakter'
        ]
        );
        
        
        if(Auth::attempt($request->only('email','password'))){
            $role = DB::table('users')->where('email', $request->email)->first();
            // dd($role);
            if($role->role == 'admin'){ //Super Admin
                return redirect('/dashboard');
            } else if($role->role == 'user'){ //User
                return redirect('/admin_customer');
            }
        } else{
            return redirect('/signin');
        }
    }

    function register(Request $request){
        \App\Models\Customer::create([
            'nama'      => $request->name,
            'alamat'  => $request->alamat,
            'telepon'     => $request->telepon,
            'sim'    => $request->sim,
        ]);
        \App\Models\User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'    => "User",
        ]);
        return redirect('/admin_customer');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
