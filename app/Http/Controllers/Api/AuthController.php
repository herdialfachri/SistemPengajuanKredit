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

    // ================= GET PROFILE =================
    public function profile(Request $request)
    {
        $user = $request->user(); // ambil user dari token

        return response()->json([
            'message' => 'Data user berhasil diambil',
            'user'    => $user,
        ]);
    }

    // ================= UPDATE PROFILE =================
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'nama'             => 'sometimes|required|string',
            'email'            => 'sometimes|required|email|unique:users,email,' . $user->id,
            'no_hp'            => 'sometimes|required|string',
            'tempat_lahir'     => 'sometimes|required|string',
            'tanggal_lahir'    => 'sometimes|required|date',
            'jenis_kelamin'    => 'sometimes|required|in:laki-laki,perempuan',
            'status_perkawinan'=> 'sometimes|required|string',
            'pekerjaan'        => 'sometimes|required|string',
            'alamat'           => 'sometimes|required|string',
            'password'         => 'nullable|min:6|confirmed',
        ]);

        $data = $request->only([
            'nama','email','no_hp','tempat_lahir','tanggal_lahir',
            'jenis_kelamin','status_perkawinan','pekerjaan','alamat'
        ]);

        // hanya update password kalau ada input
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Profile berhasil diupdate',
            'user'    => $user,
        ]);
    }
}
