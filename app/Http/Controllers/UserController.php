<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('master-dashboard.user-edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {        
       
        $user = User::find($id);
        
        // Validate the request data
        $validedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' .$user->id,
            'email' => 'required|email|unique:users,email,' .$user->id,
            'role' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $user->update([
            'name' => $validedData['name'],
            'username' => $validedData['username'],
            'email' => $validedData['email'],
            'role_id' => $validedData['role'],
            'is_active' => $validedData['is_active'],
        ]);
      
        return redirect()->route('dashboard.index')->with('success', 'User updated successfully');
      
    }

    
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User deleted successfully');
    }



    
}