<?php

namespace App\Http\Controllers;

use App\Models\PhoneBookModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    function onInsert(Request $request){
        // $request->input('username');
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;

        // return $decoded_array['user'];
        // return response()->json($decoded);
        $user = $decoded_array['user'];
        $one = $request->input('phone_number_one');
        $two = $request->input('phone_number_two');
        $name = $request->input('name');
        $email = $request->input('email');

        /////////////////////// model
        $result = PhoneBookModel::insert([
            'username'=> $user,
            'phone_number_one'=> $one,
            'phone_number_two'=> $two,
            'name'=> $name,
            'email'=> $email,
        ]);

        if ($result){
            return "Insert Successfully";
        } else {
            return "Insert Fail";
        }
    }
    function onDelete(Request $request){}
    function onUpdate(Request $request){}
    function onSelect(Request $request){}
}
