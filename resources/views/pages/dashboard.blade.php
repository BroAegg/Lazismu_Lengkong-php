@extends('layouts.admin')

@section('title', 'Dashboard - Lazismu Lengkong')

@section('content')
{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-coins text-xl"></i>
            </div>
            <span class="text-sm font-medium text-white/80">Total</span>
        </div>
        <p class="text-2xl font-bold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
        <p class="text-sm text-white/70 mt-1">Total Donasi Anda</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-hand-holding-heart text-xl text-blue-500"></i>
            </div>
            <span class="text-sm font-medium text-gray-400">Donasi</span>
        </div>
        <p class="text-2xl font-bold text-dark-500">{{ $jumlahDonasi }}</p>
        <p class="text-sm text-gray-500 mt-1">Transaksi Berhasil</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-xl text-yellow-500"></i>
            </div>
            <span class="text-sm font-medium text-gray-400">Pending</span>
        </div>
        <p class="text-2xl font-bold text-dark-500">{{ $donasiPending }}</p>
        <p class="text-sm text-gray-500 mt-1">Menunggu Verifikasi</p>
    </div>
</div>

{{-- Quick Actions --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
    <a href="{{ route('donasi') }}" class="flex flex-col items-center gap-2 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
            <i class="fas fa-heart text-primary-500"></i>
        </div>
        <span class="text-xs font-semibold text-gray-700">Donasi</span>
    </a>
    <a href="{{ route('kalkulator') }}" class="flex flex-col items-center gap-2 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
            <i class="fas fa-calculator text-green-500"></i>
        </div>
        <span class="text-xs font-semibold text-gray-700">Kalkulator</span>
    </a>
    <a href="{{ route('program.index') }}" class="flex flex-col items-center gap-2 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
            <i class="fas fa-th-large text-blue-500"></i>
        </div>
        <span class="text-xs font-semibold text-gray-700">Program</span>
    </a>
    <a href="{{ route('akun') }}" class="flex flex-col items-center gap-2 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
            <i class="fas fa-cog text-purple-500"></i>
        </div>
        <span class="text-xs font-semibold text-gray-700">Pengaturan</span>
    </a>
</div>

{{-- Recent Activity --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-dark-500">Aktivitas Terbaru</h2>
        <a href="#" class="text-sm text-primary-500 font-medium hover:text-primary-600">Lihat Semua</a>
    </div>

    @forelse($recentDonations as $donation)
    <div class="flex items-center gap-4 py-4 {{ !$loop->last ? 'border-b border-gray-50' : '' }}">
        <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $donation->status === \App\Enums\DonationStatus::VERIFIED ? 'bg-green-100' : 'bg-yellow-100' }}">
            <i class="fas {{ $donation->status === \App\Enums\DonationStatus::VERIFIED ? 'fa-check text-green-500' : 'fa-clock text-yellow-500' }}"></i>
        </div>
        <div class="flex-1 min-w-0">
            <p class="font-medium text-dark-500 text-sm truncate">{{ $donation->category?->name ?? 'Donasi' }}</p>
            <p class="text-xs text-gray-400">{{ $donation->created_at->translatedFormat('d M Y') }}</p>
        </div>
        <div class="text-right">
            <p class="font-bold text-dark-500 text-sm">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
            <span class="text-xs px-2 py-0.5 rounded-full {{ $donation->status->badgeColor() }}">{{ $donation->status->label() }}</span>
        </div>
    </div>
    @empty
    <div class="text-center py-8">
        <i class="fas fa-inbox text-3xl text-gray-300 mb-3"></i>
        <p class="text-gray-500">Belum ada aktivitas donasi.</p>
        <a href="{{ route('donasi') }}" class="inline-block mt-3 text-sm text-primary-500 font-medium">Mulai Donasi <i class="fas fa-arrow-right ml-1"></i></a>
    </div>
    @endforelse
</div>
@endsection
