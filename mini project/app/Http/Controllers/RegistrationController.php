<?php

namespace App\Http\Controllers;

use App\Models\RegistrationModel;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function onRegister(Request $request){
        $firshname = $request->input('firshname');
        $lastname = $request->input('lastname');
        $city = $request->input('city');
        $username = $request->input('username');
        $password = $request->input('password');
        $gender = $request->input('gender');

        ///////////////////////// username checking 
        $userCount = RegistrationModel::where('username', $username)->count();
        if ($userCount > 0){
            return "User Already Exists";
        } else{
            $result = RegistrationModel::insert([
                    'firshname'=>$firshname, 
                    'lastname'=>$lastname, 
                    'city'=>$city, 
                    'username'=>$username, 
                    'password'=>$password, 
                    'gender'=>$gender, 

                ]);
            if ($result){
                return "Registration Successfully";
            } else {
                return "Registration Fail Try Again";
            }
        }
    }
}
