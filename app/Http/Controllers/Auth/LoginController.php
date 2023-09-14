<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Menampilkan form login untuk admin
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Berhasil login
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role === 'petugas') {
                return redirect()->route('petugas.dashboard');
            }
        }
        
        // Gagal login
        return redirect()->route('login')->withErrors(['loginError' => 'Login Gagal']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
