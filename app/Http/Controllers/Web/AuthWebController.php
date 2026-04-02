<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

class AuthWebController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $api = new AuthController();
        $response = $api->login($request);

        $data = $response->getData(true);

        if (isset($data['token'])) {
            session([
                'token' => $data['token'],
                'user' => $data['user']
            ]);
            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        // panggil API logout supaya token dihapus
        $api = new AuthController();
        $api->logout($request);

        // hapus session di web
        session()->forget(['token', 'user']);

        return redirect()->route('login.form')->with('success', 'Logout berhasil!');
    }
}