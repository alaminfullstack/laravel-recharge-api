<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RechargeController extends Controller
{
    public function index(Request $request) {

        if($request->has('user') && $request->has('amount')){
            $user_id = $request->user;
            $amount  = $request->amount;
            $request_url = $request->url;
            $bkash = $request->bkash;
            $nagad = $request->nagad;

            return view('index', compact('user_id', 'amount', 'request_url', 'bkash', 'nagad'));
        }
        
        return "Wrong Information";
    }


    public function payment_preview(Request $request) {
        if($request->has('user') && $request->has('amount')){
            $user_id = $request->user;
            $amount  = $request->amount;
            $request_url = $request->url;
            $bkash = $request->bkash;
            $nagad = $request->nagad;
            $method = $request->payment_method;

            return view('preview', compact('user_id', 'amount', 'request_url', 'bkash', 'nagad','method'));
        }
        
        return redirect()->back()->with('error', "Wrong Information");
    }


    public function payment_confirm(Request $request) {
        if($request->has('user') && $request->has('amount')){
            $user_id = $request->user;
            $amount  = $request->amount;
            $method_number = $request->method_number;
            $method = $request->method;
            $transaction_id = $request->transaction_id;

            $response = Http::get('https://www.maxecash.com/recharge-api-request', [
                'user_id' => $user_id,
                'amount' => $amount,
                'payment_method' => $method,
                'method_number' => $method_number,
                'transaction_id' => $transaction_id,
            ]);

            if($response->successful()){
                $body = $response->object();
                $message = $body->message;
                $type = $body->type;
                $url = $body->back_url;
                return redirect()->back()->with(['message' => $message, 'type' => $type, 'url' => $url]);
            }

            
            return redirect()->back()->with('error', "Wrong Information");
        }
        
        return redirect()->back()->with('error', "Wrong Information");
    }
}
