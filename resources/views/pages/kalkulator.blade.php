@extends('layouts.app')

@section('title', 'Kalkulator Zakat - Lazismu Lengkong')

@section('content')
{{-- Page Header --}}
<section class="relative bg-dark-500 pt-40 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1585036156171-384164a8c055?w=1600')"></div>
    <div class="relative container mx-auto px-5 max-w-[1200px] text-center">
        <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">
            HITUNG ZAKAT
        </span>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Kalkulator Zakat</h1>
        <p class="text-white/70 max-w-lg mx-auto">Hitung kewajiban zakat Anda dengan mudah dan akurat</p>
    </div>
</section>

{{-- Calculator Section --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-5 max-w-[800px]">
        @livewire('zakat-calculator')
    </div>
</section>
@endsection
