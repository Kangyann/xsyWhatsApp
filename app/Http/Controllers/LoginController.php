<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $validate_data = [];
    public function __construct()
    {
        $this->validate_data = [
            'username' => 'required|min:6',
            'password' => 'required|min:8',
        ];
    }
    public function index()
    {
        //
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['request'] = $request->only(['username', 'password']);
        $validator = Validator::make($data['request'], $this->validate_data);
        if ($validator->fails()) {
            return redirect()->route('masuk.index')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            if (Auth::user()->email_verified_at === null) {
                return redirect()->route('auth.verif');
            }
            return redirect('/log/index');
        }
        return redirect()->route('masuk.index')->with(['status' => 'Gagal! Veriksa kembali data yang dimasukan.', 'code' => 500]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
