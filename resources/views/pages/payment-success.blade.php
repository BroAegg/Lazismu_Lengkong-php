@extends('layouts.admin')

@section('title', 'Pembayaran Berhasil - Lazismu Lengkong')

@section('content')
<div class="max-w-lg mx-auto text-center py-12">
    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-check text-4xl text-green-500 animate-bounce"></i>
    </div>
    <h1 class="text-2xl font-bold text-dark-500 mb-2">Donasi Berhasil Dibuat!</h1>
    <p class="text-gray-500 mb-8">Terima kasih atas kebaikan Anda. Silakan lakukan pembayaran.</p>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-card p-6 text-left mb-8">
        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-sm text-gray-500">No. Invoice</span>
                <span class="font-bold text-dark-500">{{ $donation->invoice_number }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Kategori</span>
                <span class="font-medium text-dark-500">{{ $donation->category?->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Metode Pembayaran</span>
                <span class="font-medium text-dark-500">{{ $donation->payment_method?->label() }}</span>
            </div>
            <div class="border-t border-gray-100 pt-4 flex justify-between">
                <span class="text-sm text-gray-500">Total</span>
                <span class="text-xl font-bold text-primary-500">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
            </div>
        </div>

        @if($donation->payment_method)
        <div class="mt-6 p-4 bg-blue-50 rounded-xl">
            <p class="text-sm font-semibold text-blue-700 mb-2">Instruksi Pembayaran:</p>
            <p class="text-sm text-blue-600">{{ $donation->payment_method->instructions() }}</p>
        </div>
        @endif
    </div>

    <div class="flex flex-col gap-3">
        <a href="{{ route('dashboard') }}" class="w-full py-3.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-0.5 transition-all">
            Lihat Dashboard
        </a>
        <a href="{{ route('beranda') }}" class="w-full py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-all">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
