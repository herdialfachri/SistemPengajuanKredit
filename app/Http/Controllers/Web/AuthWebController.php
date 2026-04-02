<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AuthWebController extends Controller
{
    // ================= SHOW LOGIN FORM =================
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $api = new AuthController();
        $response = $api->login($request);
        $data = $response->getData(true);

        if (isset($data['token'])) {
            session([
                'token' => $data['token'],
                'user'  => $data['user'],
            ]);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Email atau password salah']);
    }

    // ================= SHOW REGISTER FORM =================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ================= REGISTER =================
    public function register(Request $request)
    {
        $api = new AuthController();
        $response = $api->register($request);
        $data = $response->getData(true);

        if (isset($data['user'])) {
            // setelah register, langsung login otomatis
            $loginResponse = $api->login($request);
            $loginData = $loginResponse->getData(true);

            if (isset($loginData['token'])) {
                session([
                    'token' => $loginData['token'],
                    'user'  => $loginData['user'],
                ]);
                return redirect()->route('dashboard')->with('success', 'Register & login berhasil!');
            }
        }

        return back()->withErrors(['register' => 'Register gagal, cek input data']);
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        if (! session('token')) {
            return redirect()->route('login.form')->withErrors(['login' => 'Silakan login dulu']);
        }

        return view('dashboard', [
            'user'  => session('user'),
            'token' => session('token'),
        ]);
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        $token = session('token');

        if ($token) {
            // cari token di DB dan hapus
            $accessToken = PersonalAccessToken::findToken($token);
            if ($accessToken) {
                $accessToken->delete();
            }
        }

        // hapus session
        session()->forget(['token', 'user']);

        return redirect()->route('login.form')->with('success', 'Logout berhasil!');
    }
}
