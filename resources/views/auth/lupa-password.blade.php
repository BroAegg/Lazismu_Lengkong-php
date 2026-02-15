@extends('layouts.auth')

@section('title', 'Lupa Password - Lazismu Lengkong')

@section('form')
<div class="w-full max-w-md mx-auto">
    <h3 class="text-2xl font-bold text-dark-500 mb-2">Lupa Password?</h3>
    <p class="text-gray-500 mb-8">Masukkan email Anda dan kami akan mengirimkan link untuk reset password.</p>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
        <p class="text-sm text-green-600"><i class="fas fa-check-circle mr-1"></i> {{ session('success') }}</p>
    </div>
    @endif

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        @foreach($errors->all() as $error)
        <p class="text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all"
                       placeholder="email@contoh.com">
            </div>
        </div>

        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-0.5 transition-all">
            Kirim Link Reset
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        <a href="{{ route('login') }}" class="text-primary-500 font-semibold hover:text-primary-600"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Masuk</a>
    </p>
</div>
@endsection
