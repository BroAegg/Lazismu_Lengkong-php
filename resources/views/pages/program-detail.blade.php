@extends('layouts.app')

@section('title', $program->title . ' - Lazismu Lengkong')

@section('content')
{{-- Hero Image --}}
<section class="relative h-[300px] md:h-[450px] overflow-hidden">
    <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1200' }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-dark-500/80 via-transparent to-dark-500/30"></div>
    <div class="absolute top-6 left-6 z-10">
        <a href="{{ route('program.index') }}" class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</section>

{{-- Content --}}
<section class="py-8 bg-white">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Main Content --}}
            <div class="lg:w-2/3">
                <span class="inline-block px-3 py-1 text-xs font-bold rounded-full mb-3" style="background: {{ $program->pillar?->color ?? '#F7941D' }}20; color: {{ $program->pillar?->color ?? '#F7941D' }};">
                    {{ $program->pillar?->name ?? 'Program' }}
                </span>
                <h1 class="text-2xl md:text-3xl font-bold text-dark-500 mb-3">{{ $program->title }}</h1>
                <div class="flex items-center gap-3 text-sm text-gray-500 mb-6">
                    <span><i class="fas fa-map-marker-alt mr-1"></i> Kec. Lengkong, Bandung</span>
                    <span class="text-green-500"><i class="fas fa-check-circle mr-1"></i> Terverifikasi</span>
                </div>

                {{-- Mobile Progress --}}
                <div class="lg:hidden bg-gray-50 rounded-2xl p-5 mb-6">
                    @if($program->target_amount > 0)
                    <div class="flex justify-between text-sm mb-2">
                        <span class="font-bold text-dark-500">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</span>
                        <span class="text-primary-500 font-bold">{{ $program->progress_percent }}%</span>
                    </div>
                    <div class="h-3 bg-gray-200 rounded-full overflow-hidden mb-3">
                        <div class="h-full bg-gradient-to-r from-primary-500 to-accent-500 rounded-full" style="width: {{ $program->progress_percent }}%"></div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center text-xs">
                        <div><p class="font-bold text-dark-500">{{ $program->donor_count }}</p><p class="text-gray-400">Donatur</p></div>
                        <div><p class="font-bold text-dark-500">Rp {{ number_format($program->target_amount, 0, ',', '.') }}</p><p class="text-gray-400">Target</p></div>
                        <div><p class="font-bold text-dark-500">{{ $program->days_left ?? '∞' }}</p><p class="text-gray-400">Hari Lagi</p></div>
                    </div>
                    @endif
                </div>

                {{-- Tabs --}}
                <div x-data="{ activeTab: 'cerita' }" class="mb-8">
                    <div class="flex border-b border-gray-200 mb-6">
                        <button @click="activeTab = 'cerita'" :class="activeTab === 'cerita' ? 'border-primary-500 text-primary-500' : 'border-transparent text-gray-500'" class="px-4 py-3 font-semibold text-sm border-b-2 transition-colors">
                            Cerita
                        </button>
                        <button @click="activeTab = 'donatur'" :class="activeTab === 'donatur' ? 'border-primary-500 text-primary-500' : 'border-transparent text-gray-500'" class="px-4 py-3 font-semibold text-sm border-b-2 transition-colors">
                            Donatur <span class="ml-1 px-2 py-0.5 bg-gray-100 text-xs rounded-full">{{ $program->donor_count }}</span>
                        </button>
                    </div>

                    {{-- Tab: Cerita --}}
                    <div x-show="activeTab === 'cerita'" class="prose prose-sm max-w-none text-gray-600 leading-relaxed">
                        <p>{{ $program->description }}</p>
                        @if($program->content)
                        {!! $program->content !!}
                        @endif
                    </div>

                    {{-- Tab: Donatur --}}
                    <div x-show="activeTab === 'donatur'" x-cloak class="space-y-4">
                        @forelse($program->donations as $donation)
                        <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-500 font-bold text-sm shrink-0">
                                {{ strtoupper(substr($donation->display_name, 0, 2)) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-sm text-dark-500">{{ $donation->display_name }}</p>
                                        <p class="text-xs text-gray-400">{{ $donation->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="font-bold text-sm text-primary-500">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                </div>
                                @if($donation->message)
                                <p class="text-sm text-gray-500 mt-2 italic">"{{ $donation->message }}"</p>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-500 py-8">Belum ada donatur. Jadilah yang pertama!</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Sidebar (Desktop) --}}
            <div class="hidden lg:block lg:w-1/3">
                <div class="sticky top-32 bg-white rounded-2xl border border-gray-100 shadow-card p-6">
                    @if($program->target_amount > 0)
                    <p class="text-2xl font-bold text-dark-500 mb-1">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500 mb-4">terkumpul dari Rp {{ number_format($program->target_amount, 0, ',', '.') }}</p>
                    <div class="h-3 bg-gray-100 rounded-full overflow-hidden mb-4">
                        <div class="h-full bg-gradient-to-r from-primary-500 to-accent-500 rounded-full" style="width: {{ $program->progress_percent }}%"></div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 text-center text-xs mb-6">
                        <div class="p-2 bg-gray-50 rounded-xl"><p class="font-bold text-dark-500">{{ $program->donor_count }}</p><p class="text-gray-400">Donatur</p></div>
                        <div class="p-2 bg-gray-50 rounded-xl"><p class="font-bold text-dark-500">{{ $program->progress_percent }}%</p><p class="text-gray-400">Tercapai</p></div>
                        <div class="p-2 bg-gray-50 rounded-xl"><p class="font-bold text-dark-500">{{ $program->days_left ?? '∞' }}</p><p class="text-gray-400">Hari Lagi</p></div>
                    </div>
                    @endif

                    <a href="{{ route('donasi.show', $program->slug) }}" class="block w-full text-center py-3.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-0.5 transition-all mb-3">
                        <i class="fas fa-heart mr-1"></i> Donasi Sekarang
                    </a>
                    <button onclick="navigator.share?.({title: '{{ $program->title }}', url: window.location.href})" class="block w-full text-center py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-all text-sm">
                        <i class="fas fa-share-alt mr-1"></i> Bagikan
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mobile Bottom Bar --}}
<div class="lg:hidden fixed bottom-16 left-0 right-0 z-50 bg-white shadow-nav px-5 py-3 flex items-center gap-3 border-t border-gray-100">
    <div class="flex-1">
        <p class="text-xs text-gray-500">Terkumpul</p>
        <p class="font-bold text-dark-500">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</p>
    </div>
    <a href="{{ route('donasi.show', $program->slug) }}" class="px-8 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow">
        Donasi
    </a>
</div>
@endsection
