<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profiles.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'nim'         => 'required|string|max:50',
            'no_anggota'  => 'nullable|string|max:20',
            'no_telepon'     => 'required|string|max:20',
            'alamat'      => 'nullable|string|max:255',
            'password'    => 'nullable|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Update data dasar
        $user->name       = $request->name;
        $user->nim        = $request->nim;
        $user->no_anggota = $request->no_anggota;
        $user->no_telepon    = $request->no_telepon;
        $user->alamat     = $request->alamat;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Set status aktif saat user login dan update data
        $user->status = 1;
        if (Auth::user()->role == 'admin' && $request->has('role')) {
            $user->role = $request->role;
        }
        

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
