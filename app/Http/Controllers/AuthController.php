<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register');
    }

    // Metode untuk menyimpan data registrasi
    public function register(Request $request)
    {
        // Validasi data dari form registrasi
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:13',
        ]);

        // Hash password sebelum disimpan ke database
        $validatedData['password'] = Hash::make($request->password);

        // Simpan data user baru ke dalam database
        $user = User::create($validatedData);

        // Redirect ke halaman login atau halaman lain setelah registrasi berhasil
        $arrmessage = array(
            'status' => 200,
            'message' => 'Registrasi Berhasil',
        );
        return redirect()->route('login')->with('success', $arrmessage);
    }

    public function showLoginForm(Request $request)
    {
        $packages = $request->query('packages');
        $key = $request->query('pax');

        return view('auth/login',['packages' => $packages,'pax' => $key]);
    }

    public function loginAction(Request $request)
    {
        $packages = $request->input('packages');
        $key = $request->input('pax');
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Jika autentikasi berhasil
            Auth::login($user); // Logika login pengguna
            Session::put('userdata',$user);
            return redirect()->intended('/');
        } else if ($user) {
            // Jika autentikasi gagal
            return back()->withErrors([
                'password' => 'Password salah.',
            ]);
        } else {
            // Jika autentikasi gagal
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ]);
        }
    }
}
