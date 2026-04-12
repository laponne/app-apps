<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function showLogin()
    {
        return view('siswa.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();
        if (!$siswa) {
            return back()
                ->withErrors(['nis' => 'Akun belum terdaftar'])
                ->withInput();
        }

        Auth::guard('siswa')->login($siswa);
        $request->session()->regenerate();
        return redirect()->route('siswa.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('siswa.login');
    }
}
