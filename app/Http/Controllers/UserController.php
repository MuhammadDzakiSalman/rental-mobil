<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->has('search') && !empty($request->search)) {
            $users->where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('nomor_telepon', 'like', '%' . $request->search . '%')
                    ->orWhere('alamat', 'like', '%' . $request->search . '%')
                    ->orWhere('gender', 'like', '%' . $request->search . '%')
                    ->orWhere('nomor_ktp', 'like', '%' . $request->search . '%');
            });
        }

        $users = $users->paginate($request->input('show', 10));
        
        return view('data-user', compact('users'));
    }

    public function showChangePasswordForm()
    {
        return view('ganti-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Password berhasil diperbarui');
    }
}
