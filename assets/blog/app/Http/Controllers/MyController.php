<?php

namespace App\Http\Controllers;
use App\Models\User;
class MyController extends Controller
{
    public function My($name){
        return "My name is ".$name;
    }
}
