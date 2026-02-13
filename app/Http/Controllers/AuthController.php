<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show_register_form () {

        return view('auth.register');
    }

    public function show_login_form () {

        return view('auth.login');

    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'username' => 'required|min:2|unique:users,username',
            'email' => 'required|min:2|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->name = $request->first_name . " " . $request->last_name;
        $user->password = Hash::make($request->password); // bcrypt

        $user->save();

        return redirect()->route('login.show');
    }



    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|min:2',
            'password' => 'required|min:8',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('Homepage');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.show');
    }

}
