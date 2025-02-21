<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUserPassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function render()
    {
        return view('livewire.update-user-password');
    }



   public function updateUserPassword(){

  $errors =  $this->validate([
        'current_password'=>'min:8|required',
        'new_password'=>'min:8|required|confirmed',
        'new_password_confirmation'=>'min:8|required',
    ]);
    $user = Auth::user();
    if($errors){
        $this->reset(['current_password','new_password','new_password_confirmation']);
    }
    if(!Hash::check($this->current_password, $user->password)){
        session()->flash('error',__('incorrect password'));
        return;
    }else if(Hash::check($this->new_password, $user->password)){
        session()->flash('error',__('The same old password'));
        return;
    }
    $user->password = bcrypt($this->new_password);
        
    if($user->save()){
        session()->flash('UpdatedPassword',__('Password Updated ✅'));
        $this->reset(['current_password','new_password','new_password_confirmation']);
    
    }else{
        session()->flash('error',__('Somthing Wrong ,please try again'));
        $this->reset(['current_password','new_password','new_password_confirmation']);
        return;
    }

    }
}