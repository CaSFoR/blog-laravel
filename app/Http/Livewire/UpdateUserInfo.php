<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class UpdateUserInfo extends Component
{
    
public $username;

public $email;
    public function render()
    {
        return view('livewire.update-user-info');
    }

    public function updateUserInfo()
    {
        $user = Auth::user();

        $this->validate([
            'email'=>'required|email|unique:users,email,'.$user->id,
            'username'=>'min:5|required|string|alpha_dash|unique:users,username,'.$user->id
        ]);
        
        if($user->username == $this->username && $user->email == $this->email){
            return back();
        }

        $user->username =$this->username;
        $user->email = $this->email;
        $user->save();
        
        session()->flash('message','Profile Updated ✅');
       
    }







}