<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $url = str_replace('{user_id}', $user_id, 'https://api.ehaa-pay.com/service/user/{user_id}/accounts');
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();
            $balance = $data['balances_by_currency'];
            $account = $data['account_codes'];
          
            return view('welcome',compact('balance','account'));
            // Utilisez les données de réponse
            // $data contiendra les données renvoyées par l'API FastAPI
        } else {
            // La requête a échoué, gérez l'erreur
            $statusCode = $response->status();
            $errorMessage = $response->body();
            // Traitez l'erreur en conséquence
        }
        
    }
}
