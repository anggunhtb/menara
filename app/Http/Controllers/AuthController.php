<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('Registrasi Berhasil', 'Anda telah berhasil mendaftar.');

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            Alert::success('Login Berhasil', 'Selamat datang kembali!');
            return redirect()->intended($this->redirectTo());
        }
    
        Alert::error('Login Gagal', 'Email atau password salah.');
        return redirect()->back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }
    
    protected function redirectTo()
    {
        $role = Auth::user()->role;
    
        if ($role === 'admin') {
            return '/Admin/welcome';
        } elseif ($role === 'pelanggan') {
            return '/User/Home';
        }
        // Default redirect if the user role is not defined
        return '/';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Logout Berhasil', 'Anda telah berhasil logout.');
        return redirect('/');
    }
}
