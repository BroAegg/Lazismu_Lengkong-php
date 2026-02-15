@extends('layouts.auth')

@section('title', 'Daftar - Lazismu Lengkong')

@section('form')
<div class="w-full max-w-md mx-auto">
    <h3 class="text-2xl font-bold text-dark-500 mb-2">Daftar untuk menebar kebaikan</h3>
    <p class="text-gray-500 mb-8">Mulai jejak kebaikan Anda bersama Lazismu Lengkong.</p>

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        @foreach($errors->all() as $error)
        <p class="text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <div class="relative">
                <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="Masukkan nama lengkap">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="email@contoh.com">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">No. HP (Opsional)</label>
            <div class="relative">
                <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="08xxxxxxxxxx">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <div class="relative" x-data="{ show: false }">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input :type="show ? 'text' : 'password'" name="password" required
                       class="w-full pl-11 pr-12 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="Minimal 8 karakter">
                <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                    <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                </button>
            </div>
            <p class="text-xs text-gray-400 mt-1">Minimal 8 karakter</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="password_confirmation" required
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="Ulangi password">
            </div>
        </div>

        <div class="flex items-start gap-2">
            <input type="checkbox" name="terms" required class="w-4 h-4 mt-0.5 text-primary-500 border-gray-300 rounded focus:ring-primary-500">
            <span class="text-sm text-gray-600">Saya menyetujui <a href="{{ route('syarat-ketentuan') }}" class="text-primary-500 font-medium">Syarat & Ketentuan</a> dan <a href="{{ route('kebijakan-privasi') }}" class="text-primary-500 font-medium">Kebijakan Privasi</a></span>
        </div>

        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-0.5 transition-all">
            Daftar Sekarang
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-primary-500 font-semibold hover:text-primary-600">Masuk Disini</a>
    </p>
</div>
@endsection
