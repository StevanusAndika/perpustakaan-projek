<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->merge([
            'name'        => strip_tags(trim($request->name)),
            'email'       => strip_tags(trim($request->email)),
            'nim'         => strip_tags(trim($request->nim)),
            'alamat'      => strip_tags(trim($request->alamat)),
            'no_telepon'  => preg_replace('/[^0-9]/', '', $request->input('no_telepon')),
        ]);

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'nim'         => 'required|string|max:20|unique:users',
            'alamat'      => 'required|string|max:255',
            'no_telepon'  => 'required|string|max:20',
            'password'    => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'nim'         => $request->nim,
            'alamat'      => $request->alamat,
            'no_telepon'  => $request->no_telepon,
            'password'    => Hash::make($request->password),
            'role'        => 'user', // default role untuk anggota
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request): Response
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $field = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nim';

        if (Auth::attempt([$field => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withInput()->with('login_error', 'Email/NIM atau password salah!');
    }

    public function logout(Request $request): Response
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    public function refreshCsrf()
    {
        return response()->json(['csrf' => csrf_token()]);
    }

    // === Login dengan Google ===
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'      => $googleUser->getName(),
                    'email'     => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password'  => bcrypt(uniqid()),
                    'role'      => 'user', // default untuk login Google
                ]);
            } else {
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }
            }

            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login dengan Google berhasil!');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('login_error', 'Gagal login dengan Google.');
        }
    }
}
