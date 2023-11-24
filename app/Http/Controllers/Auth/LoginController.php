<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => 'Identifiant requis',
            'password.required' => 'Mot de passe requis',
        ]);

        $identifier = $request->input('username');
        $password = $request->input('password');

        $isUsername = false;
        $isPhoneNumber = false;

        // Vérifier si l'identifiant correspond à un nom d'utilisateur
        $user = User::where('username', $identifier)->first();
        if ($user) {
            $isUsername = true;
        }

        // Vérifier si l'identifiant correspond à un numéro de téléphone
        $user = User::where('phone_number', $identifier)->first();
        if ($user) {
            $isPhoneNumber = true;
        }

        // Utiliser la valeur de $isUsername et $isPhoneNumber selon vos besoins
        if ($isUsername) {
            // L'identifiant correspond à un nom d'utilisateur
            $credentials = [
                'username' => $identifier,
                'password' => $password
            ];
            
        } elseif ($isPhoneNumber) {
            // L'identifiant correspond à un numéro de téléphone
            $credentials = [
                'phone_number' => $identifier,
                'password' => $password
            ];
        } else {
            // L'identifiant ne correspond ni à un nom d'utilisateur ni à un numéro de téléphone
            return response()->json(['errors' => ['username' => ['L\'identifiant ne correspond ni à un nom d\'utilisateur ni à un numéro de téléphone']]], 422);
        }

        try {
            if (Auth::attempt($credentials)) {
               
                $request->session()->regenerate();

                $user = User::find(Auth::user()->id);
                $customerAuth = $user->getCustomerAuthCredentials();
                $clientID = $customerAuth['client_id'];
                $clientSecret = $customerAuth['client_secret'];

                $payload = [
                    'client_id' => $clientID,
                    'client_secret' => $clientSecret,
                ];
    
                $endpoint = 'https://api.ehaa-pay.com/service/login';
                $client = new Client(['verify' => false]);
              
                $response = $client->post($endpoint, [
                    'json' => $payload,
                ]);
    
                $data = json_decode($response->getBody(), true);
                $token = $data['access_token'];

                // session(['token' => $token]);
                Session::put('access_token', $token);
    
                return response()->json(['success' => true, 'token' => $token, 'redirect' => $this->redirectTo($request)]);
            } else {
                // L'authentification a échoué
                return response()->json(['success' => false, 'message' => 'Identifiants invalides']);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Récupérez l'erreur de la requête HTTP
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $errorMessage = json_decode($response->getBody(), true)['detail'];
            Log::error('Erreur: ' . $errorMessage);
    
            // Gérez l'erreur selon vos besoins
            // Par exemple, vous pouvez retourner une réponse JSON avec un message d'erreur
            return response()->json(['success' => false, 'message' => $errorMessage], $statusCode);
        } catch (\Exception $e) {
            // Gérez l'exception selon vos besoins
            $errorMessage = $e->getMessage();
            Log::error('Erreur: ' . $errorMessage);
            return response()->json(['success' => false, 'message' => 'Une erreur s\'est produite lors de l\'authentification'. $errorMessage]);
        }

    }

    private function isInvalidUsername($username)
    {
        $validUsernames = User::pluck('username')->toArray();

        if (!in_array($username, $validUsernames)) {
            return true; // Invalid username
        }

        return false; // Valid username
    }

    private function isInvalidPhone($phone_number)
    {
        $validPhone = User::pluck('phone_number')->toArray();

        if (!in_array($phone_number, $validPhone)) {
            return true; // Invalid phone_number
        }

        return false; // Valid phone_number
    }

    private function isInvalidPassword($username, $password)
    {
        // Assuming you have a database table named 'users' with 'name' and 'password' fields
        $user = User::where('username', $username)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return true; // Invalid password
        }

        return false; // Valid password
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Toastr::success('Vous avez été déconnecté(e).', 'Logout');
        Toastr::success('Vous avez été déconnecté(e).', 'Logout');

        return redirect('login');
    }

    protected function redirectTo(Request $request)
    {
        
        $this->redirectTo = '/accueil';
        return $this->redirectTo;
    }
    
}
