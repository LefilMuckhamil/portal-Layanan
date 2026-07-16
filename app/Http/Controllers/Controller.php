<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Menampilkan view form
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    // Memproses form yang disubmit
    public function prosesReset(Request $request)
    {
        // 1. Validasi Input form
        $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|numeric',
            'instansi' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'otp_code' => 'required|numeric|digits:6',
            'password' => 'required|min:8'
        ]);

        // 2. Proses reset password
        return redirect()->route('login')->with('success', 'Kata sandi berhasil diubah! Silakan login.');
    }
}