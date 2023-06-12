<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, buat session dan cookie
            $user = Auth::user();

            // simpan user_id ke dalam session
            session(['user_id' => $user->id]);

            // simpan nama custom cookie ke dalam cookie, dengan nilai "success"
            cookie('custom_cookie_name', 'success', 60);

            return redirect('/home')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        // Hapus session dan cookie
        session()->forget('user_id');
        cookie()->queue(cookie()->forget('custom_cookie_name'));

        Auth::logout();

        return redirect()->route('login');
    }

}
