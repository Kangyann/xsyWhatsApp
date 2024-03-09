@extends('auth.index')
@section('title', 'Register')
@section('register')
    <form action="{{ route('daftar.store') }}" method="POST">
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
                <input type="text"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('email') is-invalid ring-error ring-2 @enderror"
                    placeholder="Email" value="{{ old('email') }}" name="email">
                @error('email')
                    <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <span>Password :</span>
                <input type="text"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('password') is-invalid ring-error ring-2 @enderror"
                    placeholder="Password" name="password">
                @error('password')
                    <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <span>Ulangi Password :</span>
                <input type="text"
                    class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('ulangi_password') is-invalid ring-error ring-2 @enderror"
                    placeholder="Ulangi Password" name="ulangi_password">
                @error('ulangi_password')
                    <div class="text-error text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>
            @csrf
            <button type="submit" class="btn mt-2 btn-sm rounded-sm bg-v-secondary border-0 hover:bg-v-secondary"
                name="daftar">Daftar</button>
        </div>
    </form>
@endsection
