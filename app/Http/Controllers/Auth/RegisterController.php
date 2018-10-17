<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\User;
//use App\Http\Controllers\Auth\Invite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Clarkeash\Doorman\Doorman;


class RegisterController extends Controller
{

    use RegistersUsers;


    protected $doorman, $request;
//    public function __construct(Doorman $doorman, Request $request)
//    {
//        $this->request = $request;
//        $this->doorman = $doorman;
//    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/backstage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Doorman $doorman)
    {
        $this->middleware('guest');
        $this->doorman = $doorman;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            //'code' => 'exists:user_invitations,code,status,pending',
            'code' => 'required|doorman:email',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        //dd($request->all()['code']);

        $this->doorman->redeem(($request->all()['code']));

        event(new Registered($user = $this->create($request->all())));



        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

//return $this->create1([
//'name' => $data['name'],
//'email' => $data['email'],
//'password' => bcrypt($data['password']),
//])? $this->doorman->redeem($data['code']):redirect()->back();

}
