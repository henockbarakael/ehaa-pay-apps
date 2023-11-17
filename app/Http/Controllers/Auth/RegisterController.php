<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VerifyNumberController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

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
        return Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone_number' => ['required','unique:users'],
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
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
        return User::create([
            'firstname' => $data['first_name'],
            'lastname' => $data['last_name'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6|max:6',
            'confirmpassword' => 'required|same:password',
        ]);

        $username = $this->generateUsername($validatedData['first_name'], $validatedData['last_name']);

        $verify_number = new VerifyNumberController;
        $phone_number = $verify_number->verify_number($validatedData['phone_number']);

        try {
            $user = User::create([
                'username' => $username,
                'firstname' => $validatedData['first_name'],
                'lastname' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'phone_number' => $phone_number,
                'password' => bcrypt($validatedData['password']),
            ]);
            
            $firstname = $user->firstname;
            $lastname = $user->lastname;
            $user_id = $user->id;
            
            $endpoint = 'http://127.0.0.1:8000/service/create_individual';
            
            $data = [
                'first_name' => $firstname,
                'last_name' => $lastname,
                'phone_number' => $phone_number,
                'user_id' => $user_id,
            ];
            
            $response = Http::post($endpoint, $data);
            $result = $response->json();
            if ($result['success'] === true) {
                Alert::success('Compte créé avec succès ! Utilisateur: '.$username.' PIN: '.$validatedData['password'])->autoClose(3000);
                return redirect()->route('login');
            }
            else {
                Alert::error('Erreur lors de la création de l\'utilisateur. Veuillez contacter le 0828584688')->autoClose(3000);
                Log::error('Erreur lors de la création de l\'utilisateur: ' . $result);
                return redirect()->back();
            }
        
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            Log::error('Erreur lors de la création de l\'utilisateur: ' . $errorMessage);
            return redirect()->back();
        }

        
        // $phone_number = "+243828584688";

        // $otp = $this->generateOTP(); 
        // $message = "Votre code OTP est : " . $otp;
        // $user->otp = $otp;
        // $user->save(); 

        // $twilio_sid = 'AC1fa94b6680ae3d80b55461557b76759b';
        // $twilio_token = '496f4618581a3d7b81bef51f15e6e023';
        // $twilio_phone_number = '+15134881091';

        // $client = new Client($twilio_sid, $twilio_token);
        // $client->messages->create(
        //     $phone_number,
        //     [
        //         'from' => $twilio_phone_number,
        //         'body' => $message,
        //     ]
        // );

        // return redirect()->route('otp');
        
    }

    protected function generateOTP()
    {
        $otpLength = 6;
        $otp = '';

        for ($i = 0; $i < $otpLength; $i++) {
            $otp .= random_int(0, 9);
        }

        return $otp;
    }

    public static function generateUsername($firstName, $lastName)
    {
        // Convertir le prénom et le nom en minuscules
        $firstNameLower = Str::lower($firstName);
        $lastNameLower = Str::lower($lastName);

        // Supprimer les espaces et les caractères spéciaux du prénom et du nom
        $firstNameClean = Str::slug($firstNameLower, '');
        $lastNameClean = Str::slug($lastNameLower, '');

        // Prendre les deux premiers caractères du nom de famille
        $lastNameInitials = Str::substr($lastNameClean, 0, 2);

        // Concaténer le prénom et les initiales du nom de famille avec un point ou un trait d'union
        $username = $firstNameClean . '_' . $lastNameInitials;

        return $username;
    }

    public function showVerifyForm()
    {
        return view('auth.otp');
    }

    public function verifyOTP(Request $request)
    {
        $validatedData = $request->validate([
            'otp' => 'required',
        ]);

        $user = User::where('phone_number', $request->session()->get('phone_number'))->first();

        if ($user) {
            $enteredOTP = $validatedData['otp'];
            $storedOTP = $user->otp; 

            if ($enteredOTP === $storedOTP) {

                $user->is_verified = true;
                $user->save();

                return redirect()->route('home');
            }
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}
