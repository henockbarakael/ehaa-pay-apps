<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $balance = $user->getBalancesByCurrency();
        $account = User::getAccountCode($userId);
        return view('welcome', compact('balance', 'account'));
        
    }

    public function history(){
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $data = $user->getAllTransactions();
        return view('history', compact('data'));
    }
}
