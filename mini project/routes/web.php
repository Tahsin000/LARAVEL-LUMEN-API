<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->post('/registration', 'RegistrationController@onRegister');
$router->post('/login', 'LoginController@onLogin');
// $router->post('/token_test', ['middleware'=>'auth', 'uses'=>'LoginController@tokenTest']);
// $router->post('/update', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onUpdate']);


$router->post('/insert', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onInsert']);
$router->post('/delete', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onDelete']);
$router->post('/select', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onSelect']);