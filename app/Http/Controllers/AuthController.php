<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        Validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $user = User::where('email', request('email'))->first();

        if(Hash::check(request('password'), $user->getAuthPassword())){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ]; 
        }
    }

    public function logout(){

        auth()->user()->currentAccessToken()->delete();
    }
}
