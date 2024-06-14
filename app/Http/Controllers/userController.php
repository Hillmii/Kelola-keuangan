<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function daftar()
    {
        return view('page.daftar');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            "name" => "required|min:3",
            "email" => "required|email:rfc,dns|unique:users,email",
            "password" => "required|min:6",
        ]);

        User::create($data);
        return redirect('/login')->with('berhasil', 'Berhasil daftar! Silahkan login');
    }

    public function login()
    {
        return view('page.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email:rfc,dns",
            "password" => "required|min:6",
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('keuangan')->with('berhasil', 'Berhasil login!');
        }

        Session::flash('gagal', 'Email atau password salah!');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
