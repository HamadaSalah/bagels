<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Square\SquareClient;

class SquarePaymentController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new SquareClient([
            'accessToken' => 'EAAAETaCYEsH4siN7Vf66gWKF28Nc7O_ULjtWAeHyxsjXK1EpZL6QH2FhtFdTnr-',
            'environment' => 'production', // or 'production'
        ]);
    }

    public function createPayment()
    {
 
        $accessToken = 'EAAAEOQCWcxAvaoitr81nE7H3RXsSf3k0Wyk2Rs0l9zRPQS1ISLtoHqx76e1A1ac';
        $locationId = 'L1XW041K4ZH5W';
        $uniqueKey = '4290335e-6ee0-429a-94b5-69689d23eaf7';
        
        $data = [
            "idempotency_key" => $uniqueKey,
            "quick_pay" => [
                "name" => "Auto Detailing",
                "price_money" => [
                    "amount" => 12500,
                    "currency" => "USD"
                ],
                "location_id" => $locationId,
                "redirect_url" => 'https://bagels.asrixx.com/'
            ]
        ];
        
        $headers = [
            'Square-Version: 2023-11-15',
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json',
        ];
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://connect.squareupsandbox.com/v2/online-checkout/payment-links');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        
        curl_close($ch);
        if($response) {
            // dd($response);
            $responseData = json_decode($response, true);
            // Output the response
            return redirect()->to($responseData['payment_link']['long_url']);
        }
    
    }

    public function processPayment(Request $request)
    {
        $nonce = $request->input('nonce');

        try {
            $paymentsApi = $this->client->paymentsApi();

            $body = [
                'source_id' => $nonce,
                'amount_money' => [
                    'amount' => 100, // amount in cents
                    'currency' => 'USD',
                ],
                'idempotency_key' => uniqid(), // unique id for idempotency
            ];

            $response = $paymentsApi->createPayment($body);

            // Handle success
            return view('payment-success', ['response' => $response]);
        } catch (\Exception $e) {
            // Handle error
            return view('payment-error', ['error' => $e->getMessage()]);
        }
    }
}
