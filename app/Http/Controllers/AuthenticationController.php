<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    //
    public function login(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(Auth::attempt(['email' => $request->email, 'password'=>$request->password], true)) {

            $token = md5($request->email);

            $user->setRememberToken($token);

            return response()->json([
                "message" => "Login Successfull!",
                "token" => $token
            ]);

        } else {
            throw ValidationException::withMessages([
                "message" => "The provided credentials are incorrect"
            ]);
        }

    }

}
