<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');

    }

    public function auth(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $user->status = '1';
            User::where('id', $user->id)->update(['status' => $user->status]);

            return redirect('/home');
        }

        return back()->with(
            'error',
            'Usename atau Password yang anda masukkan salah.'
        );
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            // Perbarui status pengguna menjadi 'offline'
            $user->status = '0';
            User::where('id', $user->id)->update(['status' => $user->status]);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function daftar(){

        return view('auth.regis');
    }
    public function regis(Request $request){

        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'User created.');
    }
}
