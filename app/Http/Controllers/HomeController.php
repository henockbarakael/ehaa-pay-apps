<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
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
        $client = new Client(['verify' => false]);
        $response = $client->get($url);
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $data = $response->getBody()->getContents();
            $balance = $data['balances_by_currency'];
            $account = $data['account_codes'];
            return view('welcome', compact('balance', 'account'));
        }
    }
}
