@extends('auth.index')
@section('title', 'Register')
@section('register')
<form action="{{ route('daftar.store') }}" method="POST" onsubmit="showLoading()">
    <div class="flex flex-col gap-2 text-sm">
            <div class="flex flex-col gap-1">
                <span>Username :</span>
                <input type="text"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('username') is-invalid ring-error ring-2 @enderror"
                    placeholder="Username" value="{{ old('username') }}" name="username">
                @error('username')
                <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <span>Email :</span>
                <input type="email"
                class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('email') is-invalid ring-error ring-2 @enderror"
                    placeholder="Email" value="{{ old('email') }}" name="email">
                    @error('email')
                    <div class="text-error text-sm font-medium">{{ $message }}</div>
                    @enderror
            </div>
            <div class="flex flex-col gap-1">
                <span>Password :</span>
                <input type="password"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('password') is-invalid ring-error ring-2 @enderror"
                    placeholder="Password" name="password">
                @error('password')
                <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <span>Ulangi Password :</span>
                <input type="password"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('ulangi_password') is-invalid ring-error ring-2 @enderror"
                    placeholder="Ulangi Password" name="ulangi_password">
                @error('ulangi_password')
                    <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            @csrf
            <span>Sudah punya akun ? <a href="{{ route('masuk.index') }}"
                    class="text-v-secondary active:text-v-primary">Login disini</a></span>
            <div class="flex items-center gap-1.5 text-sm">
                <input type="checkbox" name="terms" id="terms"
                class="checkbox checkbox-xs mb-4 [--chkbg:theme(colors.v-secondary)] rounded" required/>
                <label for="terms" class="">Saya menyetujui <a href="#" class="hover:text-v-secondary">Persyaratan Layanan</a>
                    dan <a href="#" class="hover:text-v-secondary">Kebijakan Privasi</a></label>
                </div>
            <button type="submit" class="btn mt-2 btn-sm rounded-sm bg-v-secondary border-0 hover:bg-v-secondary"
                name="daftar">Daftar</button>
        </div>
    </form>
@endsection
