<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function signup()
    {
        return view('users.signup');
    }

    public function login() 
    {
        return view('users.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

       $loginType = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
       $credentials = [$loginType => $request->input('username'), 'password' => $request->input('password')];
        
        if(Auth::attempt($credentials)) {
            return redirect()->intended('home')->with('Login Successful!');
        } else {
            return redirect()->route('user.login')->withErrors('Users Credentials are incorrect!');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $data = $request->validate([
            'username' => 'required|min:5|max:30|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user->create($data);

        return redirect()->route('home.homepage')->with('success', "User Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
