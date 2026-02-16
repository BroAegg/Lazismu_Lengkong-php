@extends('layouts.admin')
@section('title', 'Kelola Donasi - Admin')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-bold text-dark-500">Kelola Donasi</h1>
</div>

<!-- Filters -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-4">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari invoice / nama donatur..." class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none">
        
        <select name="status" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none">
            <option value="">Semua Status</option>
            <option value="PENDING" {{ request('status') === 'PENDING' ? 'selected' : '' }}>Pending</option>
            <option value="VERIFIED" {{ request('status') === 'VERIFIED' ? 'selected' : '' }}>Verified</option>
            <option value="REJECTED" {{ request('status') === 'REJECTED' ? 'selected' : '' }}>Rejected</option>
        </select>

        <select name="category" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none">
            <option value="">Semua Kategori</option>
            @foreach(\App\Models\DonationCategory::all() as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary-dark transition-colors">
                <i class="fas fa-search mr-1"></i> Filter
            </button>
            <a href="{{ route('admin.donations.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                Reset
            </a>
        </div>
    </form>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead><tr class="border-b border-gray-200"><th class="text-left py-3 px-2">Invoice</th><th class="text-left py-3 px-2">Donatur</th><th class="text-left py-3 px-2">Kategori</th><th class="text-right py-3 px-2">Jumlah</th><th class="text-center py-3 px-2">Status</th><th class="text-center py-3 px-2">Aksi</th></tr></thead>
            <tbody>
                @forelse($donations as $d)
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="py-3 px-2 font-mono text-xs">{{ $d->invoice_number }}</td>
                    <td class="py-3 px-2">{{ $d->display_name }}</td>
                    <td class="py-3 px-2">{{ $d->category?->name }}</td>
                    <td class="py-3 px-2 text-right font-bold">Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $d->status->badgeColor() }}">{{ $d->status->label() }}</span></td>
                    <td class="py-3 px-2 text-center"><a href="{{ route('admin.donations.show', $d->id) }}" class="text-primary hover:text-primary-dark text-xs font-medium underline">Detail</a></td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-8 text-gray-400">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $donations->links() }}</div>
</div>
@endsection
