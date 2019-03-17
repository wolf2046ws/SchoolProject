<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use Auth;

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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        //dd($request->all());
        try {
            Adldap::connect();
        } catch (\Exception $e) {
            // Can't connect.
            dd($e->getMessage());
        }
        if(Adldap::auth()->attempt($request->username, $request->password)){

            $user = Adldap::search()->users()->where('samaccountname','tests')->get();
            
            dd($user);



            return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->intended($this->redirectPath());
        }
        else{
            return redirect()->back()->withErrors(['username' => 'Invalid credintilas']);
        }
        //connect trader_cdlstalledpattern
        //send credintilas
        //response true contin. false redirct back error invalid credintilas.
    }
}
