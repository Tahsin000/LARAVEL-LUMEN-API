<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailsModel;  //E:\git\LARAVEL-LUMEN-API\assets\project\app\Models\DetailsModel.php

class DetailsController extends Controller
{
    function SelectALL(){
        $result = DetailsModel::all();
        return $result;
    }
}
