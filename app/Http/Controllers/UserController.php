<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'accountType' => 'required|in:Individual,Business',
        ]);
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'account_type' => $validatedData['accountType'],
        ]);
    
        return redirect()->back()->with('success', 'User created successfully!');
    }
    
}
