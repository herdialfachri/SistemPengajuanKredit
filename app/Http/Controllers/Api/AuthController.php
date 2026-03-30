<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nik' => 'required|unique:users',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => 'nasabah'
        ]);

        // Kalau request API (JSON)
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Register berhasil, silakan login',
                'user' => $user
            ]);
        }

        // Kalau request dari web (Blade)
        return redirect()->route('login')
            ->with('success', 'Register berhasil, silakan login dengan akun Anda');
    }

    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Email atau password salah'], 401);
            }
            return back()->with('error', 'Email atau password salah');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Login berhasil',
                'token' => $token,
                'user' => $user
            ]);
        }

        // Simpan token di session
        session(['api_token' => $token]);

        // Redirect ke halaman index (dashboard)
        return redirect()->route('index')->with('success', 'Login berhasil');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }

    // GET USER
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
