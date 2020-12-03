<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Access;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Display user login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        Auth::logout();
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            //Authentication passed
            $access = new Access();

            $access->id_user = Auth::user()->id;
            $access->save();

            return redirect()->intended('/');
        }else{
            return view('auth.login', array(
                'failed' => 'failed'
            ));
        }
    }
}
