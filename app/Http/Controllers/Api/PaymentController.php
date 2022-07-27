<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //Generiamo il token del pagamento
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        
        return response()->json($data,200);
    }

    /* public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token, //token in restituzione al frontend per generare il pagamento
            'options' => [
                'sumbmitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => 'Transazione Eseguita'
            ];
            return response()->json($data,200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione Negata'
            ];
            return response()->json($data,401);
        }
        
    } */
}
