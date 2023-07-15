<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('my_app_token')->plainTextToken;
            // $cookie = cookie('cookie_token', $token, 60 * 24);
            // return response()->json(['token' => $token], Response::HTTP_OK)->withoutCookie($cookie);
            return response()->json($token);
        }
        return response()->json('Usuario y/o contraseñas no validos');
    }
    public function logout(Request $request)
    {
        //$token = Auth::user()->tokens()->delete;
        $request->user()->currentAccessToken()->delete();
        // $cookie = Cookie::forget('my_app_token');
        // return response()->json(["message" => "Logout OK"], Response::HTTP_OK)->withCookie($cookie);
        return response()->json('logout');
    }
    public function register(Request $request)
    {
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();

          $token = $user->createToken('API TOKEN');

          return response()->json([
            'message' => "User registered",
            'token' => $token->plainTextToken
        ],200);
    }
}
