<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;

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
    public function __construct(){


        $agent = new Agent();



        if (!$agent->is('Windows')) {
            $this->middleware('auth');
            return redirect()->route('login')->with('error', 'Please Login With Windows System');

        }


        $this->middleware('guest')->except('logout');


    }

    public function authenticated(Request $request) {

        $userIp = $request->ip();
        $locationData = Location::get($userIp);
        
        $agent = new Agent();

        $check = UserLog::where('user_id', auth()->user()->id)->exists();

        if ($check) {
            UserLog::where('user_id', auth()->user()->id)->update([
                'last_login_time' => Carbon::now(),
                'user_ip' => $userIp,
                'user_mac' => macID(),
                'device' => $agent->device(),
                'user_browser' => $agent->browser(),
                'user_os' => $agent->platform(),
                'login_country' => $locationData ? $locationData->countryName : '',
                'last_login' => Carbon::now()
            ]);
        } else {
            UserLog::insert([
                'user_id' => auth()->user()->id,
                'last_login_time' => Carbon::now(),
                'user_ip' => $userIp,
                'user_mac' => macID(),
                'device' => $agent->device(),
                'user_browser' => $agent->browser(),
                'user_os' => $agent->platform(),
                'login_country' => $locationData->countryName,
                'last_login' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }



        if (auth()->user()->is_admin == "3") {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->is_admin == 1) {
                    //Super Admin
                    return redirect('admin/dashboard');
                } else {
                    return redirect('home');
                }
            } else {
                return redirect()->route('login')->with('error', 'Inavlid Credential');
            }

        } else {
            if ($agent->is('Windows')) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    if (Auth::user()->is_admin == 1) {
                        //Super Admin
                        return redirect('admin/dashboard');
                    } else {
                        return redirect('home');
                    }
                } else {
                    return redirect()->route('login')->with('error', 'Inavlid Credential');
                }
            } else {
                return redirect()->route('login')->with('error', 'Please Login With Windows System');
            }
        }
    }
}
