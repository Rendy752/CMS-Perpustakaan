<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function login(Request $request){
        // $infoLogin=null;
        $request->validate([
            "email_login"=>"required|email|exists:users,email",
            "password_login"=>"required|min:8"
        ]);

        $infoLogin=[
            "email"=>$request->email_login,
            "password"=>$request->password_login
        ];

        // !$infoLogin?toastr()->error('Struktur input tidak valid'):null;

        if(Auth::attempt($infoLogin)){
            toastr()->success('Login berhasil');
            return back();
        } else {
            toastr()->error('Username dan password tidak valid');
            return back();
        }
    }

    function register(Request $request){
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8",
            "confirm_password"=>"required|min:8|same:password"
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role=='admin123'?'A':'U',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $role=$request->role=='admin123'?'admin':'user';
        toastr()->success("Registrasi berhasil sebagai $role");

        $infoLogin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infoLogin)){
            toastr()->success('Login berhasil');
            return back();
        } else {
            toastr()->error('Username dan password tidak valid');
            return back();
        }
    }

    function logout(){
        Auth::logout();
        toastr()->success('Logout berhasil');
        return redirect('home');
    }

    function profile(Request $request){
        $request->validate([
            "name_profile"=>"required|string",
        ]);

        // dd($request);

        User::find(auth()->user()->id)->update([
            'name' => $request->name_profile
        ]);

        toastr()->success("Profil berhasil diupdate");
        return redirect('home');
    }
}
