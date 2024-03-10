<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function index() {
        return redirect()->route('masuk.index');
    }
    public function verify() {
        if(Auth::user()->email_verified_at === null) {
            return 1;
        };
        return redirect()->route('dashboard');
    }
    public function log_index() {
        if(request()->has('menu') && request()->input('menu') === "connect") return view('dashboard.connect');
        return view('dashboard.dashboard');
    }
    public function logout() {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::logout();
        return redirect('/');
    }
}
