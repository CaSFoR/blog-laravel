<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordUpdate extends Controller
{
    //
    public function __construct(){
        
        $this->middleware('auth');
     }

    public function update(Request $request)
    {
       
       

        $validateData  =$request->validate([
            'current_password'=>'min:8|required',
            'new_password'=>'min:8|required|confirmed',
            'new_password_confirmation'=>'min:8|required',
        ]);
        $user = Auth::user();
        
        if(!Hash::check($request->current_password, $user->password)){
            session()->flash('messagePassword','password is incrrect');
            return back();
          }
        $user->password = bcrypt($validateData['new_password']);
        if($user->save()){
            session()->flash('messagePassword','Password Updated ✅');
            return back();
        }else{
            session()->flash('messagePassword','Somthing Wrong ,pls try again');
            return back();
        }
          
      
    }
}