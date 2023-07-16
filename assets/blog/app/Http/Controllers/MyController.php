<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MyController extends Controller
{
    // public function first()
    // {
    //     return redirect('second');
    // }
    // public function second()
    // {
    //     // return 'second';
    //     return redirect('first');
    // }
    // public function Download()
    // {
    //     // return 'second';
    //     return response()->download('HHJN.txt');
    // }
    function Catch(Request $request){
        return $request->header('HHJN');
    }

}
