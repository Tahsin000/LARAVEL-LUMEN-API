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
    -   ### Add payload array with proper information
    ```php
    $payload = [
        'iss' => 'http://example.org',
        'aud' => 'http://example.com',
        'iat' => 1356999524,
        'nbf' => 1357000000
    ];
    ```