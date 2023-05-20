<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $token = Str::random(10);

        $role = User::select('role')
            ->where('email', $request->input('email'))
            ->where('password', Hash::make($request->input('password')))
            ->first();

            if(!$role){
                return response()->json('Password salah lol');
            }

        return response()->json(compact('token', 'role'));
    }
}
