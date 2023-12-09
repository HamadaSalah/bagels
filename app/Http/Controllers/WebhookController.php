<?php

// app/Http/Controllers/WebhookController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Verify the webhook signature for security
        $signature = $request->header('X-Square-Signature');

        // Implement signature verification logic

        // Process the webhook event
        $event = json_decode($request->getContent(), true);

        // Handle different webhook events
        switch ($event['type']) {
            case 'PAYMENT_UPDATED':
                // Payment was updated, process as needed
                $paymentId = $event['data']['object_id'];
                // Implement your payment update logic here
                break;
            // Add more cases for other webhook events as needed
        }

        return response()->json(['success' => true]);
    }
}
