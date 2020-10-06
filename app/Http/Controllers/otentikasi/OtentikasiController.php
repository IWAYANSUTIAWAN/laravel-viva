<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class OtentikasiController extends Controller
{
    public function index(){
        return view('otentikasi.login');
    }

    public function login(Request $request){
       // pakai ini jika memakai session
        // $data=User::where('email',$request->email)->firstOrFail();
        // if($data){
        //     if(Hash::check($request->password,$data->password)){
        //         session(['berhasil_login'=>true]);
        //         return redirect('/dashboard');
        //     }
        // }
        //return redirect('/')->with('message','Email atau password salah');

        //--------------kita memakai bawaan laravel
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/dashboard');
        }
        return redirect('/')->with('message','Email atau password salah');
    }

    public function logout(Request $request){
       // $request->session()->flush();
       //->pakai logout bawaan laravel
       Auth::logout();
        return redirect('/');
    }
}
