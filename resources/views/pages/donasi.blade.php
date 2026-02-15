@extends('layouts.admin')

@section('title', 'Donasi - Lazismu Lengkong')

@section('content')
{{-- Mobile Header --}}
<div class="lg:hidden sticky top-0 bg-white z-40 px-5 py-4 flex items-center justify-between border-b border-gray-100">
    <a href="{{ route('dashboard') }}" class="text-gray-600"><i class="fas fa-arrow-left"></i></a>
    <h1 class="font-bold text-dark-500">Isi Nominal Donasi</h1>
    <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full"><i class="fas fa-lock mr-1"></i> Aman</span>
</div>

<div class="flex flex-col lg:flex-row gap-8">
    {{-- Desktop Sidebar: Campaign Summary --}}
    @if(isset($program))
    <div class="hidden lg:block lg:w-1/3">
        <div class="sticky top-32 bg-white rounded-2xl border border-gray-100 shadow-card overflow-hidden">
            <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400' }}" alt="{{ $program->title }}" class="w-full h-40 object-cover">
            <div class="p-5">
                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">{{ $program->pillar?->name ?? 'Program' }}</span>
                <h3 class="font-bold text-dark-500 mt-3">{{ $program->title }}</h3>
                <p class="text-sm text-gray-500 mt-2">{{ Str::limit($program->description, 100) }}</p>
            </div>
        </div>
    </div>
    @endif

    {{-- Donation Form --}}
    <div class="{{ isset($program) ? 'lg:w-2/3' : 'w-full max-w-2xl mx-auto' }}">
        @livewire('donation-form', ['program' => $program ?? null, 'categories' => $categories, 'paymentMethods' => $paymentMethods])
    </div>
</div>
@endsection
