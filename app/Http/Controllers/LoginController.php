<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Events\User\LoggedIn;
use App\Events\User\LoggedOut;
use Session;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/admin';
    protected $guard = 'web';

    public function getLogin(){
    	if(Auth::guard('web')->check()){
    		return redirect()->route('admin');
    	}
    	return view('login.index');
    }

    public function postLogin(Request $request){
    	$auth = Auth::guard('web')->attempt([
    		'username' => $request->username,
    		'password' => $request->password,
    		'active' => 1]);
    	if($auth){
            event(new LoggedIn());
    		return redirect()->route('admin');
    	}
        flash('Cannot login. Check your username and password again', 'danger');
    	return redirect()->route('login');
    }

    public function getLogout(){
        event(new LoggedOut());
    	Auth::guard('web')->logout();
        flash('You have been logged out');
    	return redirect()->route('login');
    }
}
