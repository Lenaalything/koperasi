<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // 1. Check Petugas (Admin, Bendahara, Ketua)
        if ($username === 'admin') {
            $petugas = DB::table('petugas')->where('username', 'admin')->first();
            if ($petugas && Hash::check($password, $petugas->password)) {
                Session::put('user', [
                    'id' => $petugas->id_petugas,
                    'nama' => $petugas->nama,
                    'role' => 'admin'
                ]);
                return redirect()->route('admin');
            }
        } elseif ($username === 'bendahara') {
            $petugas = DB::table('petugas')->where('username', 'bendahara')->first();
            if ($petugas && Hash::check($password, $petugas->password)) {
                Session::put('user', [
                    'id' => $petugas->id_petugas,
                    'nama' => $petugas->nama,
                    'role' => 'bendahara'
                ]);
                return redirect()->route('bendahara');
            }
        } elseif ($username === 'ketua') {
            $petugas = DB::table('petugas')->where('username', 'ketua')->first();
            if ($petugas && Hash::check($password, $petugas->password)) {
                Session::put('user', [
                    'id' => $petugas->id_petugas,
                    'nama' => $petugas->nama,
                    'role' => 'ketua'
                ]);
                return redirect()->route('ketua');
            }
        }

        // 2. Check Member in Users Table
        $user = DB::table('users')->where('name', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            $member = DB::table('member')->where('email', $user->email)->first();
            if ($member) {
                Session::put('user', [
                    'id' => $member->id_member,
                    'nama' => $member->nama,
                    'role' => 'member'
                ]);
                return redirect()->route('member');
            }
        }

        // 3. Fallback for quick login 'member' without password check (prototype compatibility)
        if ($username === 'member') {
            $member = DB::table('member')->where('id_member', 'M001')->first();
            if ($member) {
                Session::put('user', [
                    'id' => $member->id_member,
                    'nama' => $member->nama,
                    'role' => 'member'
                ]);
                return redirect()->route('member');
            }
        }

        return back()->withErrors(['message' => 'Username atau password salah!']);
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $no_telepon = $request->input('no_telepon');
        $alamat = $request->input('alamat');
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if username or email already exists
        if (DB::table('users')->where('name', $username)->exists() || DB::table('users')->where('email', $email)->exists()) {
            return back()->withErrors(['message' => 'Username atau Email sudah terdaftar!']);
        }

        // Generate ID Member
        $count = DB::table('member')->count();
        $id_member = 'M' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Insert Member
        DB::table('member')->insert([
            'id_member' => $id_member,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'email' => $email,
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert User credentials
        DB::table('users')->insert([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('landing');
    }
}
