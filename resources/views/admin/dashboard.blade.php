@extends('layouts.admin')

@section('title', 'Admin Dashboard - Lazismu Lengkong')

@section('content')
<h1 class="text-2xl font-bold text-dark-500 mb-6">Dashboard Admin</h1>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    <div class="bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl p-5 text-white">
        <p class="text-sm text-white/70">Total Penghimpunan</p>
        <p class="text-2xl font-bold mt-1">Rp {{ number_format($stats['total_penghimpunan'] ?? 0, 0, ',', '.') }}</p>
    </div>
    <div class="bg-gradient-to-br from-secondary-500 to-green-500 rounded-2xl p-5 text-white">
        <p class="text-sm text-white/70">Total Penyaluran</p>
        <p class="text-2xl font-bold mt-1">Rp {{ number_format($stats['total_penyaluran'] ?? 0, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm text-gray-500">Donasi Pending</p>
        <p class="text-2xl font-bold text-yellow-500 mt-1">{{ $stats['donasi_pending'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm text-gray-500">Total Donatur</p>
        <p class="text-2xl font-bold text-dark-500 mt-1">{{ $stats['total_donatur'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm text-gray-500">Total Mustahik</p>
        <p class="text-2xl font-bold text-dark-500 mt-1">{{ $stats['total_mustahik'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <p class="text-sm text-gray-500">Program Aktif</p>
        <p class="text-2xl font-bold text-blue-500 mt-1">{{ $stats['program_aktif'] ?? 0 }}</p>
    </div>
</div>

{{-- Admin Quick Links --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
    <a href="{{ route('admin.donations.index') }}" class="p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
        <i class="fas fa-inbox text-2xl text-primary-500 mb-2"></i>
        <p class="text-sm font-semibold text-gray-700">Kelola Donasi</p>
    </a>
    <a href="{{ route('admin.program.index') }}" class="p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
        <i class="fas fa-th-large text-2xl text-blue-500 mb-2"></i>
        <p class="text-sm font-semibold text-gray-700">Kelola Program</p>
    </a>
    @if(auth()->user()->role->value === 'kepala_kantor' || auth()->user()->role->value === 'administrasi')
    <a href="{{ route('admin.users.index') }}" class="p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
        <i class="fas fa-users text-2xl text-purple-500 mb-2"></i>
        <p class="text-sm font-semibold text-gray-700">Kelola User</p>
    </a>
    <a href="{{ route('admin.reports.index') }}" class="p-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
        <i class="fas fa-chart-bar text-2xl text-green-500 mb-2"></i>
        <p class="text-sm font-semibold text-gray-700">Laporan</p>
    </a>
    @endif
</div>

{{-- Recent Donations --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h2 class="font-bold text-dark-500 mb-4">Donasi Terbaru</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead><tr class="border-b border-gray-100"><th class="text-left py-3 px-2 font-semibold text-gray-500">Invoice</th><th class="text-left py-3 px-2 font-semibold text-gray-500">Donatur</th><th class="text-left py-3 px-2 font-semibold text-gray-500">Kategori</th><th class="text-right py-3 px-2 font-semibold text-gray-500">Jumlah</th><th class="text-center py-3 px-2 font-semibold text-gray-500">Status</th></tr></thead>
            <tbody>
                @forelse($recentDonations as $d)
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="py-3 px-2 font-mono text-xs">{{ $d->invoice_number }}</td>
                    <td class="py-3 px-2">{{ $d->display_name }}</td>
                    <td class="py-3 px-2">{{ $d->category?->name }}</td>
                    <td class="py-3 px-2 text-right font-bold">Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $d->status->badgeColor() }}">{{ $d->status->label() }}</span></td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data donasi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
