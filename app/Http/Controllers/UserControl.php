<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControl extends Controller
{
    //logging in
    function login(Request $request){
        $handel=$request->input('handel');
        $code=$request->input('code');

        $request->validate([
            'handel'=>'required|string|max:25',
            'code'=>'required'
        ]);

        $check = DB::table('users')
            ->where('name',$handel)
            ->where('password',$code)
            ->first();

        if(isset($check)){
            $request->session()->put('USERTYPE',$check->remember_token);
            $request->session()->put('USERID',$check->id);
            $request->session()->put('CHILDOF','ROOT');
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }     
    }

    //logging out
    function logOut(Request $request){

        $request->session()->forget('USERTYPE');
        $request->session()->forget('USERID');
        $request->session()->forget('CHILDOF');

        return redirect('/');    
    }
}
   