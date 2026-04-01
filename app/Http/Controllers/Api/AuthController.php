<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'role' => 'nasabah'
        ]);

        // ❌ TIDAK AUTO LOGIN

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Register berhasil',
                'user' => $user
            ]);
        }

        return redirect()->route('login')->with('success', 'Register berhasil, silakan login');
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ✅ LOGIN WEB (SESSION)
        if (! $request->expectsJson()) {

            if (!Auth::attempt($request->only('email', 'password'))) {
                return back()->with('error', 'Email atau password salah');
            }

            $request->session()->regenerate();

            return redirect()->route('index')->with('success', 'Login berhasil');
        }

        // ✅ LOGIN API (TOKEN)
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        // hapus token lama (optional biar ga numpuk)
        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user
        ]);
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        // ================= API (TOKEN) =================
        if ($request->expectsJson()) {

            $user = $request->user();

            if ($user && $user->currentAccessToken()) {
                $user->currentAccessToken()->delete(); // hapus token aktif saja
            }

            return response()->json([
                'message' => 'Logout API berhasil'
            ]);
        }

        // ================= WEB (SESSION) =================
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }



    // ================= GET USER =================
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
