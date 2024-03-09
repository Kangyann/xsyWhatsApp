@extends('auth.index')
@section('title', 'Login')
@section('login')
<form action="{{ route('masuk.store') }}" method="POST">
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
            <span>Password :</span>
            <input type="text"
                class="input input-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-v-secondary transition-all duration-150 @error('password') is-invalid ring-error ring-2 @enderror"
                placeholder="Password" name="password">
            @error('password')
                <div class="text-error text-sm font-medium">{{ $message }}</div>
            @enderror
        </div>
        @csrf
        <div class="flex items-center gap-1.5 text-sm">
            <input type="checkbox" name="remember" id="remember"
                class="checkbox checkbox-sm [--chkbg:theme(colors.v-secondary)] rounded" />
            <label for="remember" class="cursor-pointer">Ingat saya!</label>
        </div>
        <button type="submit" class="btn mt-2 btn-sm rounded-sm bg-v-secondary border-0 hover:bg-v-secondary"
            name="daftar">Masuk</button>
    </div>
</form>
@endsection
