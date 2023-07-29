# MINI PROJECT

-   ## Registration Migration Schema

    ```php
    Schema::create('registration', function (Blueprint $table) {
        $table->id();
        $table->string('firshname');
        $table->string('lastname');
        $table->string('city');
        $table->string('username');
        $table->string('password');
        $table->string('gender');
    });

    ```

-   ## Registration Model

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class RegistrationModel extends Model
    {
        protected $table = 'registration';
        protected $primaryKey = 'id';
        public $incrementing = true;
        protected $keyType = 'int';
        public $timestamps = false;
    }

    ```

-   ## Registration Controller

    ```php
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
    ```

-   ## Login Controller

    ```php
    <?php
    namespace App\Http\Controllers;

    use App\Models\RegistrationModel;
    use Illuminate\Http\Request;

    class LoginController extends Controller
    {
        function onLogin(Request $request){
            $username = $request->input('username');
            $password = $request->input('password');
            $userCount  = RegistrationModel::where([
                'username'=>$username,
                'password'=>$password,
            ])->count();

            if ($userCount){

            } else {
                return "Wrong Username or Password";
            }
        }
    }

    ```

-   ## php JWT access_token - [Click ME](https://github.com/firebase/php-jwt)

    -   ### installing

    ```php
    composer require firebase/php-jwt
    ```

    -   ### import JWT File ,

    ```php
    use Firebase\JWT\JWT;
    ```

    -   ### Add a key in the method when we are using JWT.

    ```php
    $key = env('TOKEN_KEY');
    ```

    -   ### Add payload array with proper information , this is the login php file code

    ```php
      function onLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $userCount  = RegistrationModel::where([
            'username' => $username,
            'password' => $password,
        ])->count();

        if ($userCount) {
            $key = env('TOKEN_KEY');
            $payload = [
                'site' => 'http://demo.com',
                'aud' => $username,
                'iat' => time(),
                'nbf' => time() + 3600
            ];
            $jwt = JWT::encode($payload, $key, 'HS256');
            return response()->json(['TOKEN'=> $jwt, 'Status' => "Login Success"]);
        } else {
            return "Wrong Username or Password";
        }
    }
    ```

    -   ### Middleware configuration (AuthServiceProvider)

    ```php
    public function boot()
    {

        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->input('access_token');
            $key = env('TOKEN_KEY');
            try{
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return new User();

            } catch(\Exception $e){
                return null;
            }
        });
    }
    ```

    -   ### insert data with the verify the JWT
        this is the `PhoneBookController`onInsert method code

    ```php
     function onInsert(Request $request){
        // $request->input('username');
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;

        // return $decoded_array['user'];
        // return response()->json($decoded);
        $user = $decoded_array['user'];
        $one = $request->input('phone_number_one');
        $two = $request->input('phone_number_two');
        $name = $request->input('name');
        $email = $request->input('email');

        /////////////////////// model
        $result = PhoneBookModel::insert([
            'username'=> $user,
            'phone_number_one'=> $one,
            'phone_number_two'=> $two,
            'name'=> $name,
            'email'=> $email,
        ]);

        if ($result){
            return "Insert Successfully";
        } else {
            return "Insert Fail";
        }
    }
    ```

    this is the routing code

    ```php
    $router->post('/insert', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onInsert']);
    ```
