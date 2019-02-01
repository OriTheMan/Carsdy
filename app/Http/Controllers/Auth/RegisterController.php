<?php

namespace Carsdy\Http\Controllers\Auth;

use Carsdy\User;
use Carsdy\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForm(){
        return View('register');
    }

    public function processForm(Request $request){
        $data = $request->all();
        $validator = $this->validator($data);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $this->create($data);
        return redirect()->route("home");   
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules =  [
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:254', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alphaNum'],
        ];

        $messages = [
            'username.required' => "You must specify a username.",
            'email.required' => "You must specify an email.",
            'password.required' => "You must specify a password.",
            'min' => ":Attribute can't be less than :min characters.",
            'max' => ":Attribute can't be more than :max characters.",
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Carsdy\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
