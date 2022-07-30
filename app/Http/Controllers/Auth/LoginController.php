<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // stuff to do after user logs in
        $cookie_name = "user_logged";
        $cookie_value = $user->name;
        setcookie($cookie_name, $cookie_value, time()+10800);;

        //dd($_COOKIE["pippobaudo"]);
    }



    /* QUI SOTTO LA FUNZIONE CHE REINDIRIZZA ALLA ADMIN.HOME UNA VOLTA CHE SI FA IL LOGOUT */

    /**
     * Logout trait
     *
     * @author Yugo <dedy.yugo.purwanto@gmail.com>
     * @param  Request $request
     * @return void         
     */
    protected function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        setcookie("user_logged", "", time() - 3600);

        return redirect()->route('admin.home');
    }
}
