<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

   public function autenticate(Request $request){
      $credentials = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required'],
     ]);

     if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

         return redirect()->intended('dashboard');
     }

     return back()->with('error', 'Email Atau Password Salah ');
   }

   public function login(){
    return view('auth.login');
   }

   public function daftar_user(Request $request){
      $request->validate([
         'nama' => 'required',
         'email' => 'required|unique:users|email',
         'role' => 'required',
         'password' => 'required',
         'password_conf' => 'required|same:password',
     ]);

      User::create([
         'name' => $request->nama,
         'email' => $request->email,
         'role' => $request->role,
         'password' => $request->password,
      ]);

      return redirect('/')->with('success', 'Registrasi Berhasil, Silahkan Login');
   }

   public function register(){
    return view('auth.register');
   }

   public function logout(Request $request){
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect(route('login'));
   }
}
