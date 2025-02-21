<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAvatar extends Controller
{
    
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the uploaded file
        $request->validate([
            'avatar' => 'required|image|max:1024|mimes:png,jpg,jpeg',
        ]);
        $avatar_path = $user->avatar; // Default to the existing image path
    
        if ($request->hasFile('avatar')) {
            $newImageName = uniqid().'-'.'avatar-user' .'.'.$request->avatar->extension();
            $directory = 'avatar';
            $request->avatar->move(base_path($directory), $newImageName);
    
            $avatar_path = $directory . '/' . $newImageName;
    
          // Check if the new image path is different from the existing one
            if ($user->avatar && $user->avatar !== $avatar_path && file_exists(base_path($user->avatar))) {
                // Delete the old image if it's different
                unlink(base_path($user->avatar));
            }
        }
        $user->avatar = $avatar_path;
        $user->save();

        // Redirect back or return a response as needed
        return redirect()->route('editInfo')->with('AddAvatar','Avatar uploaded successfully');
    }
}