<?php

namespace App\Http\Controllers;
use illuminate\support\Facades\DB;

class ExampleController extends Controller
{
    function testConn(){
        $dbname = DB::connection()->getDatabaseName();
        return $dbname;
    }
}