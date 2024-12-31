<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Tambahkan import untuk Controller
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nama', 'password', 'role');

        if (Auth::attempt($credentials)) {
            // Redirect berdasarkan role
            if ($request->role === 'pasien') {
                return redirect()->route('janji_temu.index');
            }
            // Tambahkan logika untuk role lainnya jika diperlukan
        }

        return back()->withErrors([
            'login' => 'Login gagal. Silakan coba lagi.',
        ]);
    }
}