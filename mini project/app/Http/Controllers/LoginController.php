<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;

use App\Models\RegistrationModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function tokenTest(){
        return "Token is OK";
    }
    function onLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $userCount  = RegistrationModel::where([
            'username' => $username,
            'password' => $password,
        ])->count();

        if ($userCount) {
            $key = env('TOKEN_KEY');
            $payload = [
                'site' => 'http://demo.com',
                'aud' => $username,
                'iat' => time(),
                'exp' => time() + 60
            ];
            $jwt = JWT::encode($payload, $key, 'HS256');
            return response()->json(['TOKEN'=> $jwt, 'Status' => "Login Success"]);
        } else {
            return "Wrong Username or Password";
        }
    }
}
