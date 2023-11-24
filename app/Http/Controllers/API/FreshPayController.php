<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VerifyNumberController;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FreshPayController extends Controller
{
    public function deposit_form()
    {
        return view('auth.register');
    }

    public function deposit_request(Request $request){
        $messages = [
            'amount.required' => 'Le montant est requis.',
            'currency.required' => 'La devise est requise.',
            'phone_number.required' => 'Le numéro mobile money est requis.',
        ];
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ], $messages);

        $amount = $validatedData['amount'];
        $currency = $validatedData['currency'];
        $phone = new VerifyNumberController;
        $customer_number = $phone->verify_number($validatedData['phone_number']);
        $operator = $phone->operator($customer_number);

        if ($operator != "airtel" && $operator != "orange" && $operator != "mpesa") {
            return response()->json([
                'success' => false,
                'message' => $operator.' Le numéro saisi n\'est pas d\'un opérateur mobile money enregistré en RDC.',
            ]);
        }

        $user_name = Auth::user()->firstname.' '.Auth::user()->lastname;
        $user_number = Auth::user()->phone_number;
        $userId = Auth::user()->id;
        $accountCode = User::getAccountCode($userId);
        
        $token = Session::get('access_token');

        $data = [
            'account_code' => $accountCode,
            'user_name' => $user_name,
            'user_number' => $user_number,
            'receipt_name' => $user_name,
            'receipt_number' => $customer_number,
            'amount' => $amount,
            'currency' => $currency,
            'operator' => $operator,
        ];

        $endpoint = 'http://127.0.0.1:8000/service/deposit';

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $client = new Client(['verify' => false]);

        $response = $client->post($endpoint, [
            'json' => $data,
            'headers' => $headers,
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        if ($result['status_code'] === 200) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        elseif ($result['status_code'] === 401) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        else {
            Log::error($result['message']);
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message']
            ]);
        }
    }

    public function send_money_form()
    {
        return view('auth.register');
    }

    public function send_money_request(Request $request){
        $messages = [
            'receipt_name.required' => 'Le nom du bénéficiaire est requis.',
            'amount.required' => 'Le montant est requis.',
            'currency.required' => 'La devise est requise.',
            'phone_number.required' => 'Le numéro mobile money est requis.',
        ];
        $validatedData = $request->validate([
            'receipt_name' => 'required',
            'phone_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ], $messages);

        $amount = $validatedData['amount'];
        $currency = $validatedData['currency'];
        $receipt_name = $validatedData['receipt_name'];
        $phone = new VerifyNumberController;
        $receipt_number = $phone->verify_number($validatedData['phone_number']);
        $operator = $phone->operator($receipt_number);

        if ($operator != "airtel" && $operator != "orange" && $operator != "mpesa") {
            return response()->json([
                'success' => false,
                'message' => 'Le numéro saisi n\'est pas d\'un opérateur mobile money enregistré en RDC.',
            ]);
        }

        $user_name = Auth::user()->firstname.' '.Auth::user()->lastname;
        $user_number = Auth::user()->phone_number;
        $userId = Auth::user()->id;
        $accountCode = User::getAccountCode($userId);
        
        $token = Session::get('access_token');

        $data = [
            'account_code' => $accountCode,
            'user_number' => $user_number,
            'receipt_name' => $receipt_name,
            'receipt_number' => $receipt_number,
            'amount' => $amount,
            'currency' => $currency,
            'operator' => $operator,
        ];

        $endpoint = 'http://127.0.0.1:8000/service/send-money';

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $client = new Client(['verify' => false]);

        $response = $client->post($endpoint, [
            'json' => $data,
            'headers' => $headers,
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        if ($result['status_code'] === 200) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        elseif ($result['status_code'] === 401) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        else {
            Log::error($result['message']);
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message']
            ]);
        }
    }

    public function withdraw_form()
    {
        return view('auth.register');
    }

    public function withdraw_request(Request $request){
        $messages = [
            'amount.required' => 'Le montant est requis.',
            'currency.required' => 'La devise est requise.',
            'phone_number.required' => 'Le numéro mobile money est requis.',
        ];
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ], $messages);

        $amount = $validatedData['amount'];
        $currency = $validatedData['currency'];
        $phone = new VerifyNumberController;
        $customer_number = $phone->verify_number($validatedData['phone_number']);
        $operator = $phone->operator($customer_number);

        if ($operator != "airtel" && $operator != "orange" && $operator != "mpesa") {
            return response()->json([
                'success' => false,
                'message' => 'Le numéro saisi n\'est pas d\'un opérateur mobile money enregistré en RDC.',
            ]);
        }
       
        $user_name = Auth::user()->firstname.' '.Auth::user()->lastname;
        $user_number = Auth::user()->phone_number;
        $userId = Auth::user()->id;
        $accountCode = User::getAccountCode($userId);
        
        $token = Session::get('access_token');

        $data = [
            'account_code' => $accountCode,
            'user_number' => $user_number,
            'user_name' => $user_name,
            'receipt_name' => $user_name,
            'receipt_number' => $customer_number,
            'amount' => $amount,
            'currency' => $currency,
            'operator' => $operator,
        ];

        $endpoint = 'http://127.0.0.1:8000/service/withdraw';

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $client = new Client(['verify' => false]);

        $response = $client->post($endpoint, [
            'json' => $data,
            'headers' => $headers,
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        if ($result['status_code'] === 200) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        elseif ($result['status_code'] === 401) {
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message'],
            ]);
        }
        else {
            Log::error($result['message']);
            return response()->json([
                'status_code' => $result['status_code'],
                'success' => $result['success'],
                'message' => $result['message']
            ]);
        }
    }
}
