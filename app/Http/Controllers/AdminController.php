<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function formLoginAdmin(){
        return view('login/formLoginAdmin');
    }
    public function loginAdmin(Request $request, Admin $admin){
        $credentials = $request -> validate([
            'email' => ['required', 'email'], 
            'password' => ['required'],
        ]);
        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->route('home')->with('msg', 'Admin logado!');
        }
         return redirect()->route('formLoginAdmin')->with('msg', 'Erro ao efetuar o login!');
    }
}
