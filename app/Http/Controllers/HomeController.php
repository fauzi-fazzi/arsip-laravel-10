<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Arsip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('menu.home.index', [
            'title' => 'Dashboard',
            'countArsip' => Arsip::count(),
            'countUser' => User::count(),
        ]);
    }
}
