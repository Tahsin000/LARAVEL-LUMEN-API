<?php

namespace App\Http\Controllers;

use App\Models\DetailsModel;
use Illuminate\Support\Facades\DB;

class myController extends Controller
{
    function getData()
    {
        $result =  DB::table('details')->sum('roll');
        return $result;
    }
}