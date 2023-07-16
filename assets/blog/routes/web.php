<?php

$router->get('/{name}', 'MyController@My');

// $router->get('/get', function (){
//     return "I am get method";
// });
// $router->post('/post', function (){
//     return "I am post method";
// });
// $router->put('/put', function (){
//     return "I am put method";
// });
// $router->delete('/delete', function (){
//     return "I am delete method";
// });

// $router->post('/name/{nameValue}/age/{ageValue}', function($nameValue, $ageValue){
//     return 'Name is '.$nameValue.' & '.$ageValue;
// });

// $router->post('/name/{nameValue}[/{cityValue}]', function($nameValue, $cityValue=null){
//     return 'Name is '.$nameValue.' & city '.$cityValue;
// });