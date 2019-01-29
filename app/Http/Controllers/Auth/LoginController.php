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
            'username' => 'required|min:6',
            'password' => 'required|alphaNum|min:6'
        ];

        $messages = [
            'required' => "Can't log in without your :attribute",
            'min' => "Your :attribute must be at least :min characters long"
        ];

        // Run validation
        $validation = $request->validate($rules);

        // Authenticate
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

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
