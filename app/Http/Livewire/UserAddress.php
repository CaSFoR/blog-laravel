<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserAddress extends Component
{
    public $address;
    public function render()
    {
        return view('livewire.user-address');
    }


    public function userAddress()
    {
        $user = Auth::user();

        $this->validate([
            'address'=>'min:3',
        ]);
        
        if($user->address == $this->address){
            return back();
        }
        $user->address = $this->address;
        $user->save();
        
        session()->flash('message','Address Updated ✅');
       
    }
}