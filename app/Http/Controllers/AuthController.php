<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_ktp' => 'required|string|max:20|unique:users,nomor_ktp',
            'nomor_telepon' => 'required|string|max:15|unique:users,nomor_telepon',
            'gender' => 'required|in:pria,wanita',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nomor_ktp' => $request->nomor_ktp,
            'nomor_telepon' => $request->nomor_telepon,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Berhasil mendaftar, silahkan login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nomor_telepon' => 'required|string|max:15',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['nomor_telepon' => $request->nomor_telepon, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role === 'admin' || $user->role === 'owner') {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('home.index');
            }
        }

        throw ValidationException::withMessages([
            'nomor_telepon' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
