<?php

namespace App\Http\Controllers;

use App\Models\SnapToken;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function post_midtrans(Request $request)
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.midtrans_server');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $gross = null;
        if ($request->plan === "3day") $gross = ['amount'=> 10000, 'plan' => 3];
        if ($request->plan === "7day") $gross = ['amount'=> 20000, 'plan' => 7];
        if ($request->plan === "30day") $gross = ['amount'=> 50000, 'plan' => 30];
        $params = array(
            'transaction_details' => array(
                'order_id' => 'ID-XSY' . mt_rand(1, 999999),
                'gross_amount' => $gross['amount'],
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->username,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_hp,
            ),
        );

        $getToken = \Midtrans\Snap::getSnapToken($params);
        $createToken = SnapToken::create([
            'order_id' => $params['transaction_details']['order_id'],
            'gross_amount' => $params['transaction_details']['gross_amount'],
            'snap_token' => $getToken,
            'user_id' => auth()->user()->id,
            'plan' => $gross['plan'],
        ]);
        return redirect()->route('dashboard');
    }
    public function index()
    {
        return redirect()->route('masuk.index');
    }
    public function midtrans()
    {
        return view('dashboard.midtrans');
    }
    public function verify()
    {
        if (Auth::user()->email_verified_at === null) {
            return 1;
        };
        return redirect()->route('dashboard');
    }
    public function log_index()
    {
        if (request()->has('c') && request()->input('c') === "UUwpEFNpdXSoeQCSTLbe800aqyZnQYCg9btliTxoBCSXOzZszRSz5ptXvKidZhUu") return view('dashboard.connect');
        if (request()->has('c') && request()->input('c') === "f0wR1XKS4la8RnARSU7W86wG5Q5GcVsKLrEuuJhlNXogC2xZbZqWFnadSHWDSaIO") return view('dashboard.broadcast');
        if (request()->has('c') && request()->input('c') === "y0BPBeRdpQkszRDXP6HdKLmstFcXKGpllRnQAvA2UpfWuGE219XSHCMsckRbZ5Wm") {
            $snapToken = SnapToken::with(['user','transaction'])->where('user_id', auth()->user()->id)->get();
            return view('dashboard.subscription', compact('snapToken'));
        };

        return view('dashboard.dashboard');
    }
    public function logout()
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::logout();
        return redirect('/');
    }
}
