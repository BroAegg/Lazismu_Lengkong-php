@extends('layouts.auth')

@section('title', 'Masuk - Lazismu Lengkong')

@section('form')
<div class="w-full max-w-md mx-auto">
    <h3 class="text-2xl font-bold text-dark-500 mb-2">Masuk untuk mulai tolong-menolong sesama</h3>
    <p class="text-gray-500 mb-8">Selamat datang kembali! Silakan masuk ke akun Anda.</p>

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        @foreach($errors->all() as $error)
        <p class="text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
        <p class="text-sm text-green-600"><i class="fas fa-check-circle mr-1"></i> {{ session('success') }}</p>
    </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email atau No. HP</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="credential" value="{{ old('credential') }}" required
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="email@contoh.com atau 08xxxxxxxxxx">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <div class="relative" x-data="{ show: false }">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input :type="show ? 'text' : 'password'" name="password" required
                       class="w-full pl-11 pr-12 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="Masukkan password">
                <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                    <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" class="w-4 h-4 text-primary-500 border-gray-300 rounded focus:ring-primary-500">
                <span class="text-sm text-gray-600">Ingat saya</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-primary-500 hover:text-primary-600 font-medium">Lupa Password?</a>
        </div>

        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-0.5 transition-all">
            Masuk
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Belum punya akun? <a href="{{ route('register') }}" class="text-primary-500 font-semibold hover:text-primary-600">Daftar</a>
    </p>

    <div class="flex items-center gap-3 my-6">
        <div class="flex-1 h-px bg-gray-200"></div>
        <span class="text-xs text-gray-400">Atau lebih cepat</span>
        <div class="flex-1 h-px bg-gray-200"></div>
    </div>

    <button class="w-full py-3.5 bg-white border border-gray-200 rounded-xl flex items-center justify-center gap-3 font-medium text-gray-700 hover:bg-gray-50 transition-all text-sm" disabled>
        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
        Masuk dengan Google <span class="text-xs text-gray-400">(Segera)</span>
    </button>
</div>
@endsection
