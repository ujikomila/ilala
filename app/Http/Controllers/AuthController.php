<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

       ]);

      if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->kategori_id == 1){
            return redirect()->route('dashboard')->with('succes', 'login as admin Successfully');
        } else{
            return redirect()->route('index')->with('succes', 'Login Succesfully');
        }
    }
        return redirect()->back()->with('error', 'Password or Name salah');
    
 }      
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}