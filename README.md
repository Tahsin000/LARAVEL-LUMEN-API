# LARAVEL-LUMEN-API

## 1. installation

- Install Lumen by issuing the Composer create-project command in your terminal:

  ```php
  composer create-project --prefer-dist laravel/lumen blog
  ```

- built-in PHP development server:

  ```php
  php -S localhost:8000 -t public
  ```

## 2. File Structure

1. controllers: our app logics.
2. middlewares: API security here.
3. migrations: Database schema here.
4. model: Data model here
5. routes: Endpoints for the API.
6. .env: Database Connection.
7. web: Main Routing Point

## 3. Methods For Rest API

1. $router->get($uri, $callback);
2. $router->post($uri, $callback);
3. $router->put($uri, $callback);
4. $router->delete($uri, $callback);

<hr/>

- ### Meaning of URI: Uniform Resource Identifier
- ### routing configuration

  ```php
  $router->get('/get', function (){
      return "I am get method";
  });
  $router->post('/post', function (){
      return "I am post method";
  });
  $router->put('/put', function (){
      return "I am put method";
  });
  $router->delete('/delete', function (){
      return "I am delete method";
  });

  ```

## 4. Route Parameters

1. Required Parameters
2. Optional Parameters

- ### Required Parameters example [Single Parameters]

  ```php
  $router->post('/name/{value}', function($value){
      return $value;
  });
  ```

- ### Required Parameters example [Multiple Parameters]

  ```php
  $router->post('/name/{nameValue}/age/{ageValue}', function($nameValue, $ageValue){
      return 'Name is '.$nameValue.' & age is '.$ageValue;
  });
  ```

- ### Optional Parameters example [Multiple Parameters]

  ```php
  $router->post('/name/{nameValue}[/{cityValue}]', function($nameValue, $cityValue=null){
      return 'Name is '.$nameValue.' & city '.$cityValue;
  });
  ```

## 5. What is Rest API

A REST API (Representational State Transfer API) is a web service architecture that follows the principles of scalability, statelessness, and uniform interface. It provides a standardized way for clients to interact with server resources over the internet.

### Principles of REST API

- **Stateless Communication**: REST APIs do not store client state on the server. Each request contains all the necessary information for the server to process it.

- **Client-Server Architecture**: REST APIs follow a client-server model where the server provides resources and services, and the client consumes them.

- **Uniform Interface**: REST APIs have a consistent and uniform interface, typically using HTTP methods like GET, POST, PUT, DELETE to perform operations on resources.

- **Resource-Based**: REST APIs are based on resources identified by unique URLs. Clients can interact with these resources by making requests to their respective URLs.

- **Stateless Operations**: Each request is independent and self-contained. The server does not rely on the state of previous requests.

## 6. Controller [How to create controller?]

- ### What is controller?

  Controller is a class to organize the logics of http request. Controller gather data from model class and prepare it for request.

- ### How to create controller?

  Make a controller file in this location `app\Http\Controllers` name as the `MyController`, write this code in the MyController

- ### Example

  ```php
  <?php
  namespace App\Http\Controllers;
  use App\Models\User;
  class MyController extends Controller
  {
    public function My($name){
        return "My name is ".$name;
    }
  }

  ```

## 7. Controller [How to use controller?]

We use controller class as callback function in route like 'ControllerClass@Method'

- ### Example

  ```php
  $router->get('/{name}', 'MyController@My');
  ```

- ### Controller [How Pass Parameter To Controller?]

- ### Example

  ```php
  $router->get('/{id}', 'MyCon@My')
  ```

## 8. API Response

- Simple String Json Response and Body
- Json Response Body From Various Types Of Array
- Redirect Response To Another URI
- Understanding Download Response

- ### Response Area:
  - Body
  - Header
- ### Response Type:
  - Simple String
  - JSON
  - XML
  - Download
  - Redirect

## 9. Response Area [Header]

- write this code in the api controller file as your controller folder
  ```php
  public function My($name){
      return response($name)
          ->header('name', $name)
          ->header('age', '45')
          ->header('username', 'HHJN')
          ->header('city', 'Dhaka');
  }
  ```

## 10. JSON Response in Body From Array

- ### Example
  write this code in api controller file
  ```php
  public function My()
  {
      $myArray = [
          "Peter" => "53",
          "Ben" => "73",
          "Joe" => "34",
      ];
      return response()->json($myArray);
  }
  ```

## 11. JSON Response in Body From Array

- ### Response Redirect
  This is routing configuration
  ```php
  $router->get('/first', 'MyController@first');
  $router->get('/second', 'MyController@second');
  ```
  This is controller code
  ```php
  public function first(){
    return redirect('second');
  }
  public function second(){
      // return 'second';
    return redirect('first');
  }
  ```
- ### Response Download

  - first paste any file in the public folder , like audio, video or text, etc , i can make a text file in the public folder. my file is `HHJN.txt`
  - and also make a function in the api controller , i my case our api controller is MyController

  ```php
  public function Download(){
      return response()->download('HHJN.txt');
  }
  ```

## 12. Sending And Catching

- ### Way of Send And Catch: [URL Parameter & JSON Data]

  1. controller code

  ```php
  namespace App\Http\Controllers;
  use App\Models\User;
  use Illuminate\Http\Request;

  class MyController extends Controller
  {
      function Catch(Request $request){
          return $request;
      }
  }
  ```

  - routing file code

  ```php
  $router->post('/catch', 'MyController@Catch');
  ```

- ### Way of Send And Catch: [Header Parameter]

  controller code

  ```php
  namespace App\Http\Controllers;
  use App\Models\User;
  use Illuminate\Http\Request;

  class MyController extends Controller
  {
      function Catch(Request $request){
          return $request->header('PASS YOUR HEADER KEY');
      }
  }
  ```

  ## 13. package manager in laravel

  - ### In the laravelthe common package manager site is [packagist](https://packagist.org/)

  - ### installation

  ```php
  composer require noitran/opendox
  ```

  - ### setup the bootstrap/app file configuration

  ```php
  $app->register(Noitran\Opendox\ServiceProvider::class);
  $app->configure('opendox');
  ```

  - ### create a file as name as the ```api-docs.yml```
    In the Inside of this file some code insert it

  - ### Finally we will run this code
    ```php
    php artisan opendox:transform
    ```