<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasterDashboardController extends Controller
{
    //
    public function index()
    {

        $users = User::where('id', '!=', auth()->id())->get();

        return view('master-dashboard.users',compact('users'));
    }
}