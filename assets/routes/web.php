<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\myController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// c:\xampp\htdocs\database_api\app\Http\Controllers\ExampleController.php


// $router->get('/', 'ExampleController@testConn');
$router->get('/', 'myController@getData');
// Route::get('/', [ExampleController::class, 'data']);

