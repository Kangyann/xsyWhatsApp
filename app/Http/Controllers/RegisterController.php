<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $validate_data = [], $user_data = [];

    public function __construct()
    {
        $this->validate_data = [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
            'ulangi_password' => 'required|min:8|same:password',
        ];
    }
    public function index()
    {
        return view('auth.register');
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
        $data['request'] = $request->only(['username', 'email', 'password', 'ulangi_password', 'daftar']);
        $validator = Validator::make($data['request'], $this->validate_data);
        if ($validator->fails()) {
            return redirect()->route('daftar.index')
                ->withErrors($validator)
                ->withInput();
        }
        // return validate_data;
        $this->user_data = [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ];
        $store_to_database = User::create($this->user_data);
        if ($store_to_database) return redirect()->route('daftar.index')->with(['status' => 'Daftar Berhasil', 'code' => 200]);
        return redirect()->route('daftar.index')->with(['status' => 'Daftar Gagal', 'code' => 500]);
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
        //
    }
}
