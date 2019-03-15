<?php

namespace App\Http\Controllers;

use Adldap\Laravel\Facades\Adldap;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\AbstractDefaultParametersMatcher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        try {
            Adldap::connect();
        } catch (\Exception $e) {
            // Can't connect.
            dd($e->getMessage());
        }
        $user = Adldap::search()->users()->get();

        dd($user);

        dd(Adldap::auth()->attempt("uid=gauss,dc=example,dc=com", "password", $bindAsUser = true));
        $user = Adldap::getDefaultProvider();
        dd(Adldap::auth()->attempt('euler', 'password'));
        $conn_settings = config('adldap.connections')[config('adldap_auth.connection')]['connection_settings'];
        $credentials = $request->only(config('adldap_auth.usernames.eloquent'), 'password');
        $credentials['password'] = 'password';
        $credentials['username'] = 'gauss';
//        dd($credentials);
        $user_format = env('ADLDAP_USER_FORMAT', 'uid=%s,' . $conn_settings['base_dn']);
        dd($user_format,$conn_settings['base_dn'],config('adldap.connections'));
        $userdn = sprintf($user_format, $credentials[config('adldap_auth.usernames.eloquent')]);
        $pass = $credentials['password'];

        if(Adldap::auth()->attempt($userdn, $pass, $bindAsUser = true)) {
            dd('true');
        }

        dd('false');
        return view('home');
    }
}
