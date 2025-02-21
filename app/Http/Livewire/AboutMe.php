<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AboutMe extends Component
{
    public $aboutMe ;
    public function render()
    {
        return view('livewire.about-me');
    }



    public function aboutMe()
    {
        $user = Auth::user();

        $this->validate([
            'aboutMe'=>'min:3|max:180',
        ]);
        
        if($user->about_me == $this->aboutMe){
            return back();
        }

        $user->about_me = $this->aboutMe;
        $user->save();
        
        session()->flash('message','Profile Updated ✅');
       
    }
}