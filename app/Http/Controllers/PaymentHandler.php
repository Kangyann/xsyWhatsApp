<?php

namespace App\Http\Controllers;

use App\Models\PaymentHandler as Payment;
use App\Models\SnapToken;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentHandler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'transaction_id' => $request->transaction_id,
            'transaction_status' => $request->transaction_status,
            'payment_type' => $request->payment_type,
            'issuer' => isset($request->issuer) ? $request->issuer : null,
            'order_id' => $request->order_id,
            'va_number' => isset($request->va_numbers[0]['va_number']) ? $request->va_numbers[0]['va_number'] : null,
            'bank' => isset($request->va_numbers[0]['bank']) ? $request->va_numbers[0]['bank'] : null,
            'merchant_id' => $request->merchant_id,
            'gross_amount' => $request->gross_amount,
            'currency' => $request->currency,
            'transaction_time' => $request->transaction_time,
            'expiry_time' => isset($request->expiry_time) ? $request->expiry_time : null,
        ];

        $token = SnapToken::with('transaction')->where('order_id', $data['order_id'])->first();
        if ($token->transaction) {
            if ($token->transaction->transaction_status !==  $data['transaction_status']) {
                $token->transaction->transaction_status = $data['transaction_status'];
                $token->transaction->save();
                if ($token->transaction->transaction_status === "settlement") {
                    $token->expire = 1;
                } else {
                    $token->expire = 0;
                }
            }
        } else {
            $db_create = Transaction::create($data);
            $token->transaction_id = $db_create->id;
        }
        $token->save();
        return response()->json(
            [
                'message' => 'success',
                'response' => 'Delivery data midtrans Successfully'
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentHandler $paymentHandler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentHandler $paymentHandler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentHandler $paymentHandler)
    {
        //
    }
}
