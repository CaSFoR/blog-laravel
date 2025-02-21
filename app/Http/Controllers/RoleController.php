<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();

        return view('master-dashboard.roles',compact('roles'));
    }

    public function edit(Role $role) {
        return view('master-dashboard.role-edit', compact('role'));
        
    }
    public function storeRole(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ],
        [
            //custom message for validation errors
            'name' => 'The name role is exists', 
        ]);
        
        $validData = ucfirst($validData['name']);
        
        Role::create([
            'name' => $validData
        ]);
    
        return redirect()->back()->with('success', 'Role created successfully.');
    }
    
public function update(Request $request, Role $role) {
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:10',
    ]);

    // Update the role with the validated data
    $role->update($validatedData);

    // Redirect the user to the index page with a success message
    return redirect()->route('role.index')->with('success', 'Role updated successfully.');
}

    public function destroy(Role $role)
    {
        // Perform validation or authorization checks if needed

        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }



}