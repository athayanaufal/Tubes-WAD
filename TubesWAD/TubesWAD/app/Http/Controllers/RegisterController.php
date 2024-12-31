<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Tambahkan model User jika diperlukan

class RegisterController extends Controller
{
    // Menampilkan halaman registrasi
    public function index()
    {
        return view('auth.register'); // Arahkan ke view auth/register.blade.php
    }

    // Memproses data registrasi
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'nik' => 'required|numeric|digits:16',
            'phone' => 'required|numeric',
        ]);

        // Simpan data ke database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'nik' => $validated['nik'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
