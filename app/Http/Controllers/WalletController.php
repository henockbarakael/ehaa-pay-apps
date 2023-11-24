<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $balance = $user->getBalancesByCurrency();
        $account = User::getAccountCode($userId);
        return view('wallet.index', compact('balance', 'account'));
    }
}
