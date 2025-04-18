<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();  
        return Inertia::render('Admin/Users/Index', ['users' => $users]);
    }

    public function store(Request $request){
        $validate=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6',
            'role'=>'required|in:admin,user',
        ]);

        User::create([
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password' => Hash::make($validate['password']),
            'role'=>$validate['role'],
        ]);

        return Inertia::render('Admin/Users/Index');
    }
}
