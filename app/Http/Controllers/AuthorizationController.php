<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function authorize(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        if ($request->code === '.miru') {
            $expiryTime = now()->addMinutes(1);
            $request->session()->put('authorized', true);
            $request->session()->put('expiry', $expiryTime);

            return response()->json(['status' => 'success', 'expiry' => $expiryTime]);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid access code.'], 403);
    }
}
