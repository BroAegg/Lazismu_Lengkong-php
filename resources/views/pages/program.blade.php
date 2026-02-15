@extends('layouts.app')

@section('title', 'Program Kebaikan - Lazismu Lengkong')

@section('content')
{{-- Page Header --}}
<section class="relative bg-dark-500 pt-40 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1600')"></div>
    <div class="relative container mx-auto px-5 max-w-[1200px] text-center">
        <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">
            ZAKAT, INFAQ, SEDEKAH
        </span>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Program Kebaikan</h1>
        <p class="text-white/70 max-w-lg mx-auto">Donasi Anda menjadi harapan bagi mereka yang membutuhkan</p>
    </div>
</section>

{{-- Filter & Programs --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-5 max-w-[1200px]">
        {{-- Pillar Filter --}}
        <div class="flex flex-wrap gap-3 mb-10 justify-center">
            <a href="{{ route('program.index') }}" class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all {{ !request('pilar') ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                Semua
            </a>
            @foreach($pillars as $pillar)
            <a href="{{ route('program.index', ['pilar' => $pillar->slug]) }}" class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all {{ request('pilar') === $pillar->slug ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                <i class="{{ $pillar->icon }} mr-1"></i> {{ $pillar->name }}
            </a>
            @endforeach
        </div>

        {{-- Programs Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($programs as $program)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-card hover:shadow-lg hover:-translate-y-1 transition-all group">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400' }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="px-3 py-1 bg-white/90 text-xs font-bold rounded-full" style="color: {{ $program->pillar?->color ?? '#F7941D' }}">
                            {{ $program->pillar?->name ?? 'Program' }}
                        </span>
                    </div>
                    @if($program->days_left !== null)
                    <div class="absolute top-3 right-3">
                        <span class="px-3 py-1 bg-dark-500/80 text-white text-xs font-bold rounded-full">
                            <i class="fas fa-clock mr-1"></i> {{ $program->days_left }} hari lagi
                        </span>
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-dark-500 mb-2 line-clamp-2">{{ $program->title }}</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $program->description }}</p>

                    @if($program->target_amount > 0)
                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="font-semibold text-dark-500">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</span>
                            <span class="text-gray-400">Rp {{ number_format($program->target_amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-primary-500 to-accent-500 rounded-full transition-all" style="width: {{ $program->progress_percent }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs mt-1">
                            <span class="text-gray-400">{{ $program->donor_count }} donatur</span>
                            <span class="font-bold text-primary-500">{{ $program->progress_percent }}%</span>
                        </div>
                    </div>
                    @endif

                    <a href="{{ route('program.show', $program->slug) }}" class="block w-full text-center py-2.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-semibold rounded-xl hover:shadow-orange-glow transition-all text-sm">
                        Donasi Sekarang
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada program untuk kategori ini.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $programs->withQueryString()->links() }}
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-gradient-to-r from-primary-500 to-accent-500">
    <div class="container mx-auto px-5 max-w-[1200px] text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Berbagi Kebaikan?</h2>
        <p class="text-white/80 mb-8 max-w-lg mx-auto">Setiap rupiah yang Anda donasikan akan menjadi penolong bagi saudara kita.</p>
        <a href="{{ route('donasi') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary-500 font-bold rounded-xl shadow-lg hover:-translate-y-1 transition-all">
            <i class="fas fa-heart"></i> Donasi Sekarang
        </a>
    </div>
</section>
@endsection
