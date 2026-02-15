@extends('layouts.admin')
@section('title', 'Detail Donasi - Admin')
@section('content')
<a href="{{ route('admin.donations.index') }}" class="text-sm text-gray-500 hover:text-primary-500 mb-4 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
    <h1 class="text-xl font-bold text-dark-500 mb-4">{{ $donation->invoice_number }}</h1>
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div><span class="text-gray-500">Donatur:</span> <span class="font-medium">{{ $donation->display_name }}</span></div>
        <div><span class="text-gray-500">Email:</span> <span class="font-medium">{{ $donation->donor_email }}</span></div>
        <div><span class="text-gray-500">Kategori:</span> <span class="font-medium">{{ $donation->category?->name }}</span></div>
        <div><span class="text-gray-500">Sub-Kategori:</span> <span class="font-medium">{{ $donation->subCategory?->name ?? '-' }}</span></div>
        <div><span class="text-gray-500">Program:</span> <span class="font-medium">{{ $donation->program?->title ?? '-' }}</span></div>
        <div><span class="text-gray-500">Metode:</span> <span class="font-medium">{{ $donation->payment_method?->label() }}</span></div>
        <div><span class="text-gray-500">Jumlah:</span> <span class="font-bold text-primary-500">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span></div>
        <div><span class="text-gray-500">Status:</span> <span class="px-2 py-1 text-xs rounded-full {{ $donation->status->badgeColor() }}">{{ $donation->status->label() }}</span></div>
        <div><span class="text-gray-500">Tanggal:</span> <span class="font-medium">{{ $donation->created_at->translatedFormat('d M Y H:i') }}</span></div>
        @if($donation->message)<div class="col-span-2"><span class="text-gray-500">Pesan:</span> <span class="italic">{{ $donation->message }}</span></div>@endif
    </div>
</div>

@if($donation->status === \App\Enums\DonationStatus::PENDING)
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h2 class="font-bold text-dark-500 mb-4">Verifikasi Donasi</h2>
    <form method="POST" action="{{ route('admin.donations.verify', $donation->id) }}" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label><textarea name="notes" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none"></textarea></div>
        <div class="flex gap-3">
            <button type="submit" name="status" value="verified" class="px-6 py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-colors"><i class="fas fa-check mr-1"></i> Verifikasi</button>
            <button type="submit" name="status" value="failed" class="px-6 py-3 bg-red-500 text-white font-bold rounded-xl hover:bg-red-600 transition-colors"><i class="fas fa-times mr-1"></i> Tolak</button>
        </div>
    </form>
</div>
@endif
@endsection
