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


        $user = User::where('email', $request->email)->first();

        $email = $request->email;


        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!$user ||  ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "email" => ['The provided credenetials are incorrect.']
            ]);
        }


        $currentToken = $user->tokens->first();

        if($currentToken) {
            return \response()->json([
                "message" => "Kamu Sudah Login!",
                "token" => \md5($email)
            ]);
        }

        return response()->json([
            "message" => "Berhasil Login!",
            "token" => $user->createToken($email)->plainTextToken
        ], 200);

    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "message" => 'Logout Berhasiil!'
        ], 200);
    }

}
