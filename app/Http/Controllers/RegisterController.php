<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'nama_lengkap' => 'required|string|unique:users',
            'alamat' => 'required|string'
        ]);

        // Proses pendaftaran
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'user_type' => 'peminjam'
        ]);

        // Tindakan lain setelah pendaftaran berhasil, misalnya login user

        return redirect()->route('login.login')->with('success', 'Pendaftaran berhasil!');
    }
}
