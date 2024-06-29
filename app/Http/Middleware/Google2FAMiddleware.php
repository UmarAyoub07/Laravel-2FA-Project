<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class Google2FAMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if 2FA is enabled


        if (true) {
            $user = Auth::user();
            $recovery_codes = json_decode($user->recovery_codes, true); // Decode JSON to array

            if (in_array($request->input('one_time_password'), $recovery_codes)) {
                // Remove the used recovery code
                $recovery_codes = array_diff($recovery_codes, [$request->input('one_time_password')]);
                $user->recovery_codes = json_encode(array_values($recovery_codes)); // Encode back to JSON
                $user->save();

                // Mark user as authenticated for 2FA
                $authenticator = app(Authenticator::class)->boot($request);
                $authenticator->login();

                return $next($request);
            }



            $authenticator = app(Authenticator::class)->boot($request);

            if ($authenticator->isAuthenticated()) {
                return $next($request);
            }

            return $authenticator->makeRequestOneTimePasswordResponse();
        }


        // If 2FA is not enabled, just proceed
        return $next($request);
    }
}
