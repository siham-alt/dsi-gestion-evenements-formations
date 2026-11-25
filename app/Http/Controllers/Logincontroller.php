<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register()
    {
        return view('prj/register');
    }

    public function registersave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email, // Fix typo
            'password' => Hash::make($request->password), // Fix typo
            'type' => 0 // Default to user
        ]);

        return redirect()->route('acceuil'); // Ensure route exists
    }
    public function login(){
        return view('prj/login');
    }
    public function loginaction(request $request){
        Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ])->validate();
        if(!Auth::attempt($request->only('email','password'),$request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email'=>trans('auth.failed')
            ]);
        }
     
        $request->session()->regenerate();

        if(auth()->user()->type == 'admin'){
            return redirect()->route('base'); 
            }
            else{
                return redirect()->route('acceuil');
            }
       
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('acceuil');
    }
    public function acceuil(){
        return view('prj/acceuil');
    }
    
}

