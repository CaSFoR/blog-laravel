<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
class UserAvatar extends Component
{

    use WithFileUploads;
    public $avatar;
    public $userAvatar;


    // public function updatedPhoto()
    // {
    //     $this->validate([
    //         'photo' => 'image|max:1024|mimes:png,jpg,jpeg', // 1MB Max
    //     ]);
    // }
 

    public function saveAvatar()
    {
      $user = Auth::user();

        // Validate the uploaded file
        $this->validate([
            'avatar' => 'image|max:1024|mimes:png,jpg,jpeg', // 1MB Max
        ]);

        // Remove the old avatar if it exists
        if ($user->avatar) {
            // Delete the old avatar from the storage
            Storage::delete($user->avatar);
        }

        // Store the new avatar file and get its path
        $filename = $this->avatar->store('avatars');

        // Update the user's avatar field in the database
        $user->update([
            'avatar' => $filename
        ]);
    }

    public function render()
    {
        $user = Auth::user();
        if ($user) {
            try {
                $this->userAvatar = Storage::disk('avatars')->url($user->avatar);
            } catch (\Exception $e) {
                $this->userAvatar = 'https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg';
            }
        } else {
            $this->userAvatar = 'https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg';
        }
        return view('livewire.user-avatar');
    }
}