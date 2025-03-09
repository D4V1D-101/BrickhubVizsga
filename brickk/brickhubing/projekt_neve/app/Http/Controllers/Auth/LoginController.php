<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validáljuk a bejövő kérést
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Próbáljuk meg a felhasználót hitelesíteni
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Ellenőrizzük, hogy a felhasználó admin-e
            if (!$user->isAdmin()) {
                Auth::logout();
                return response()->json(['error' => 'Forbidden'], 403);
            }

            // További logika a sikeres bejelentkezéshez
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['error' => 'These credentials do not match our records.'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful']);
    }
}
