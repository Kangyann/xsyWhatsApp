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
        return 1;
    }
    public function log_index() {
        return view('dashboard.index');
    }
    public function logout() {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::logout();
        return redirect('/');
    }
}
