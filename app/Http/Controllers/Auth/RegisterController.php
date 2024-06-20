<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPVerificationMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make(request()->all(), [



        ]);

        if($validator->fails()) {

            $errors = $validator->errors();
        }

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:1'],
           // 'g-recaptcha-response' => ['recaptcha'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   protected function create(array $data)
    {
        // Création de l'utilisateur
        $user = User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        // Récupération de l'utilisateur fraîchement créé
        $user = User::find($user->id);

        // Génération de l'OTP
        $otpCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        // Mise à jour de l'OTP de l'utilisateur
        $user->otp = $otpCode;
        $user->save();

        // Envoi du nouvel OTP par email
        Mail::to($data['email'])->send(new OTPVerificationMail($otpCode));

        // Retourne l'utilisateur créé
        return $user;
    }
}
