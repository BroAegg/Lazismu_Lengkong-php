@extends('layouts.admin')
@section('title', 'Kelola Donasi - Admin')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-bold text-dark-500">Kelola Donasi</h1>
</div>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead><tr class="border-b border-gray-200"><th class="text-left py-3 px-2">Invoice</th><th class="text-left py-3 px-2">Donatur</th><th class="text-left py-3 px-2">Kategori</th><th class="text-right py-3 px-2">Jumlah</th><th class="text-center py-3 px-2">Status</th><th class="text-center py-3 px-2">Aksi</th></tr></thead>
            <tbody>
                @forelse($donations as $d)
                <tr class="border-b border-gray-50">
                    <td class="py-3 px-2 font-mono text-xs">{{ $d->invoice_number }}</td>
                    <td class="py-3 px-2">{{ $d->display_name }}</td>
                    <td class="py-3 px-2">{{ $d->category?->name }}</td>
                    <td class="py-3 px-2 text-right font-bold">Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $d->status->badgeColor() }}">{{ $d->status->label() }}</span></td>
                    <td class="py-3 px-2 text-center"><a href="{{ route('admin.donations.show', $d->id) }}" class="text-primary-500 hover:text-primary-600 text-xs font-medium">Detail</a></td>
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
