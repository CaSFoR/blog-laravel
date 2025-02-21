<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    //

    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        // dd($request->name);
        $vaildateData = $request->validate([
            'name'=>'required|string|max:20',
            'email'=>'required|email|max:100',
            'message'=>'required|min:10|max:255'
        ]);
        $request->session()->put('username',$request->name);
        return redirect()->back()->with('success', 'Your Message has been sent successfully');
    }
}