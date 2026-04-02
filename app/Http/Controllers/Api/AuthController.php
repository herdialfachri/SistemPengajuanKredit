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
            'nik'              => 'required|unique:users',
            'nama'             => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:6|confirmed',
            'no_hp'            => 'required',
            'tempat_lahir'     => 'required',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:laki-laki,perempuan',
            'status_perkawinan' => 'required',
            'pekerjaan'        => 'required',
            'alamat'           => 'required',
        ]);

        $user = User::create([
            'nik'              => $request->nik,
            'nama'             => $request->nama,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'no_hp'            => $request->no_hp,
            'tempat_lahir'     => $request->tempat_lahir,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan'        => $request->pekerjaan,
            'alamat'           => $request->alamat,
            'role'             => 'nasabah',
        ]);

        return response()->json([
            'message' => 'Register berhasil',
            'user'    => $user,
        ]);
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah',
            ], 401);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }

        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }

    // ================= GET USER =================
    public function getUsers(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }
}
