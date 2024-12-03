<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate ([
            'name'      => 'required|string|max:250',
            'email'     => 'required|email|max:250|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('buku.index')->with('success', 'You have successfully registered and logged in');
    }

    public function login()
    {
        return view('auth.login');
    }

    // Memproses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Melakukan autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('buku.index')->with('success', 'You have successfully logged in');
        }

        // Jika autentikasi gagal, kembali ke halaman login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }

    // Menghandle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Mengarahkan kembali ke halaman buku.index setelah logout
        return redirect()->route('buku.index')->with('success', 'You have successfully logged out');
    }

    // Menampilkan halaman dashboard
    public function dashboard()
    {
        // Mengecek apakah pengguna sudah login
        if (Auth::check()) {
            return redirect()->route('buku.index');
        }

        // Jika belum login, arahkan ke halaman login
        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access this page'
        ])->onlyInput('email');
    }


}
