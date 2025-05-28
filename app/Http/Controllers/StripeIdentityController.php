<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Identity\VerificationSession;

class StripeIdentityController extends Controller
{
    public function createVerificationSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = VerificationSession::create([
            'type' => 'document',
            'metadata' => [
                'user_id' => auth()->id(), // or any identifier
            ],
            'return_url' => route('stripe.verify.identity.callback'), // after verification
        ]);

        // Save session ID to user or database for later reference
        \App\Helpers\GeneralHelper::pred($session);
        $user = auth()->user();
        $user->stripe_verification_session_id = $session->id;
        $user->save();

        return redirect($session->url); // redirects user to Stripe verification flow
    }

    public function handleCallback(Request $request)
    {
        $user = auth()->user();

        if (!$user || !$user->stripe_verification_session_id) {
            return redirect('/')->with('error', 'Verification session not found.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = VerificationSession::retrieve($user->stripe_verification_session_id);

        if ($session->status === 'verified') {
            $user->identity_verified = true;
            $user->save();

            return redirect('/')->with('success', 'Identity Verified!');
        }

        return redirect('/')->with('error', 'Identity verification failed or is still processing.');
    }
}
