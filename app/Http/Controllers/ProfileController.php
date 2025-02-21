<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */   
    
     public function __construct(){
        
        $this->middleware('auth');
     }

    public function index()
    {
        //
        $user = Auth::user();
        $userArticles = Article::where('user_id',$user->id)->orderBy('id','DESC')->limit(4)->get();
        return view('dashboard/account',compact('user','userArticles'));
    }

    public function edit()
    {
        $user = Auth::user();
         return view('dashboard/edit',compact('user'));

    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password'=>'required|email|unique:users,email,'.$user->id,
            'username'=>'min:5|required',
        ]);
        if($user->username == $request['username'] && $user->email == $request['email']){
            return back();
        }

        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->save();
        session()->flash('message','Profile Updated ✅');
        return back();
    }

    public function destroy()
    {
       $user = Auth::user();
        $user->delete();
        return redirect()->to('/');
    }
}