<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo;

    public function redirectTo(){
        switch (Auth::user()->role) {
            case '1':
                $this->redirectTo = '/piket-kurikulum';
                return $this->redirectTo;
                break;
            case '2':
                $this->redirectTo = '/guru';
                return $this->redirectTo;
                break;
            case '3':
                $this->redirectTo = '/pembimbing-rayon';
                return $this->redirectTo;
                break;
            case '4':
                $this->redirectTo = '/orangtua';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
