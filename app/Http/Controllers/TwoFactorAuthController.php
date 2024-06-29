<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthController extends Controller
{
    public function index()
    {
        return view('google2fa.index');
    }

    public function verify(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $valid = $google2fa->verifyKey(Auth::user()->google2fa_secret, $request->one_time_password);

        if ($valid) {
            $request->session()->put('2fa_verified', true);
            return redirect()->route('home');
        }

        return redirect()->route('2fa.index')->withErrors(['one_time_password' => 'Invalid OTP']);
    }

    public function enable()
    {
        $google2fa = app('pragmarx.google2fa');
        $secret = $google2fa->generateSecretKey();

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            Auth::user()->email,
            $secret
        );

        return view('google2fa.enable', ['QR_Image' => $QR_Image, 'secret' => $secret]);
    }

    public function store(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $valid = $google2fa->verifyKey($request->secret, $request->one_time_password);

        if ($valid) {
            $user = Auth::user();
            $user->google2fa_secret = $request->secret;
            $user->save();

            return redirect()->route('home')->with('success', '2FA Enabled Successfully');
        }

        return redirect()->route('2fa.enable')->withErrors(['one_time_password' => 'Invalid OTP']);
    }

    public function disable()
    {
        $user = Auth::user();
        $user->google2fa_secret = null;
        $user->save();

        return redirect()->route('home')->with('success', '2FA Disabled Successfully');
    }
}
