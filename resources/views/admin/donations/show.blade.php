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
    
    <!-- Verify Form -->
    <form method="POST" action="{{ route('admin.donations.verify', $donation->id) }}" class="mb-4" x-data="{ showVerify: false }">
        @csrf @method('PUT')
        <button type="button" @click="showVerify = !showVerify" class="px-6 py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-colors">
            <i class="fas fa-check mr-1"></i> Verifikasi Donasi
        </button>
        
        <div x-show="showVerify" x-transition class="mt-4 space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors">
                    Konfirmasi Verifikasi
                </button>
                <button type="button" @click="showVerify = false" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </form>

    <!-- Reject Form -->
    <form method="POST" action="{{ route('admin.donations.reject', $donation->id) }}" x-data="{ showReject: false }">
        @csrf @method('PUT')
        <button type="button" @click="showReject = !showReject" class="px-6 py-3 bg-red-500 text-white font-bold rounded-xl hover:bg-red-600 transition-colors">
            <i class="fas fa-times mr-1"></i> Tolak Donasi
        </button>
        
        <div x-show="showReject" x-transition class="mt-4 space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alasan Penolakan <span class="text-red-500">*</span></label>
                <textarea name="notes" rows="3" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none" placeholder="Jelaskan alasan penolakan..."></textarea>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                    Konfirmasi Penolakan
                </button>
                <button type="button" @click="showReject = false" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endif
@endsection
