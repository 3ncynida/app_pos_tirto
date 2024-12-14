<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
class GoogleController extends Controller
{
    // Redirect user ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback setelah user login di Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cari user berdasarkan email, atau buat baru
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'role' => 'Cashier', // Default role
                    'password' => bcrypt('default_password'), // atau null
                ]
            );

            // Login user ke aplikasi
            Auth::login($user);

            if (Auth::user()->role === 'Admin'){
                return redirect()->route('sekolah.dashboard'); // Redirect ke halaman home
            }
            return redirect()->route('sekolah.transaction.index'); // Redirect ke halaman home
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}
