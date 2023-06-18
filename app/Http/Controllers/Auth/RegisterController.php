<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\GmailValidation;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email'     => ['required', 'email', new GmailValidation],
            'role_name' => 'required|string|max:255',
            'password'  => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'password_confirmation' => 'required',
        ]);


        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Password::min(8)
        //             ->mixedCase()
        //             ->letters()
        //             ->numbers()
        //             ->symbols()
        //             ->uncompromised(),
        //     'password_confirmation' => 'required',
        //     ],
        // ]);

        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Buat Akun Baru Berhasil :)','Success');
        return redirect('login');
    }
}
