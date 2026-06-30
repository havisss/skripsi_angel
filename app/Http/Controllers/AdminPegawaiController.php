<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPegawaiController extends Controller
{
    public function index()
    {
        // Hanya ambil user dengan role admin (Pegawai)
        $pegawais = User::where('role', 'admin')->get();
        return view('admin.pegawai.index', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|max:2048'
        ]);

        $photoPath = null;
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'profile_photo' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Pegawai / Admin baru berhasil ditambahkan.');
    }
}
