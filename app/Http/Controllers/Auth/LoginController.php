<?php

namespace Carsdy\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Carsdy\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Use username for authentication
     * 
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logoutUser');
    }

    public function showForm(){
        return View('login');
    }

    public function processForm(Request $request){

        $rules = [
            'username' => 'required|min:6|max:50',
            'password' => 'required|alphaNum|min:6'
        ];

        $messages = [
            'required' => "Can't log in without your :attribute",
            'min' => "",
            'max' => "",
        ];

        // Run validation
        $validation = $request->validate($rules, $messages);
        if($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }

        // Authenticate
        $credentials = $request->only('username', 'password');
        $remember_me = $request->only('remember_me');

        if (Auth::attempt($credentials, $remember_me)) {

            // Authentication passed...
            return redirect()->intended('home');

        }else{
            return redirect()->intended('login');
        }
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/home');
    }
}
