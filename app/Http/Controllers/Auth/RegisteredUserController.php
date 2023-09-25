<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(Utility::getValByName('signup_button') == 'on'){
            return view('auth.register');
        }else{
            return abort('404', 'Page not found');
        }

    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_code' => 'required|max:5',
            'phone' => 'required|max:10',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if(env('RECAPTCHA_MODULE') == 'yes')
        {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }else{
            $validation = [];
        }
        $this->validate($request, $validation);
        $role = Role::findByName('company');
        $setting = Utility::settings();

        if(isset($setting['email_verification']) && $setting['email_verification']=='on' )
        {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'country_code' => $request->phone_code,
                'contact' => $request->phone,
                'password' => Hash::make($request->password),
                'type' => $role->name,
                'lang' => Utility::getValByName('default_language'),
                'created_by' => 1,
            ]);
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'country_code' => $request->phone_code,
                'contact' => $request->phone,
                'password' => Hash::make($request->password),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'type' => $role->name,
                'lang' => Utility::getValByName('default_language'),
                'created_by' => 1,
            ]);
        }

        $user->assignRole($role);
        //event(new Registered($user));

        Auth::login($user);
        try{
            event(new Registered($user));
        }catch(\Exception $e){
            $user->delete();
            return redirect('/register/lang?')->with('status', __('Email SMTP settings does not configure so please contact to your site admin.'));
        }
        //return view('auth.verify-email');

        return redirect(RouteServiceProvider::HOME);
    }

    public function showRegistrationForm($lang = '')
    {
        if($lang == '')
        {
            $lang = Utility::getValByName('default_language');
        }
        \App::setLocale($lang);


        $countries = DB::table('countries')->get();
        if(Utility::getValByName('signup_button')=='on'){
            return view('auth.register', compact('lang', 'countries'));
        }
        else{
            return abort('404', 'Page not found');
        }
    }
}
