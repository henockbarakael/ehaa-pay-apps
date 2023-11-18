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
            'username.required' => 'Nom d\'utilisateur requis',
            'password.required' => 'Mot de passe requis',
        ]);

        // Perform login logic
        $username = $credentials['username'];
        $password = $credentials['password'];

    

        if ($this->isInvalidUsername($username)) {
            return response()->json(['errors' => ['username' => ['Nom d\'utilisateur invalide!']]], 422);
        }

        if ($this->isInvalidPassword($username, $password)) {
            return response()->json(['errors' => ['password' => ['Mauvais mot de passe!']]], 422);
        }

        // Login success
        // Add your code here to handle successful login
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
        
                // Generate a token using JWT
                $payload = [
                    'username' => $username,
                    'exp' => time() + 3600, // Token expiration time (1 hour)
                ];
                $secretKey = Str::random(32);
                $algorithm = 'HS256';
        
                $token = JWT::encode($payload, $secretKey, $algorithm);
        
                // Store the token in the user's session or return it in the response
                // For example, you can use Laravel's session:
                session(['token' => $token]);
        
                return response()->json(['success' => true, 'token' => $token, 'redirect' => $this->redirectTo($request)]);
            } else {
                // Authentication failed
                return response()->json(['success' => false, 'message' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            // Handle the exception
            $errorMessage = $e->getMessage();
            return response()->json(['success' => false, 'message' => 'An error occurred during authentication'. $errorMessage]);
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
