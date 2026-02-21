@extends('layouts.admin')
@section('title', 'Edit Program - Admin')
@section('content')
<a href="{{ route('admin.program.index') }}" class="text-sm text-gray-500 hover:text-primary-500 mb-4 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h1 class="text-xl font-bold text-dark-500 mb-6">Edit Program: {{ $program->title }}</h1>
    <form method="POST" action="{{ route('admin.program.update', $program) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')

        {{-- Identitas Program --}}
        <div>
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Identitas Program</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Program <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $program->title) }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilar <span class="text-red-500">*</span></label>
                    <select name="pillar_id" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                        @foreach($pillars as $p)<option value="{{ $p->id }}" {{ old('pillar_id', $program->pillar_id) == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Dana (PSAK 109) <span class="text-red-500">*</span></label>
                    <select name="psak_fund_type" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                        @foreach(\App\Enums\PsakFundType::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('psak_fund_type', $program->psak_fund_type?->value) === $type->value ? 'selected' : '' }}>{{ $type->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="2" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">{{ old('description', $program->description) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konten / Cerita Program</label>
                    <textarea name="content" rows="8" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500 font-mono text-sm">{{ old('content', $program->content) }}</textarea>
                    <p class="text-xs text-gray-400 mt-1"><i class="fas fa-info-circle"></i> Mendukung tag HTML: &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;</p>
                </div>
            </div>
        </div>

        {{-- Finansial --}}
        <div>
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Finansial</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Target Donasi (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="target_amount" value="{{ old('target_amount', $program->target_amount) }}" min="0" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Terkumpul (Rp)</label>
                    <input type="number" name="collected_amount" value="{{ old('collected_amount', $program->collected_amount) }}" min="0" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                    <p class="text-xs text-gray-400 mt-1">Adjustment manual</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Donatur</label>
                    <input type="number" name="donor_count" value="{{ old('donor_count', $program->donor_count) }}" min="0" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                </div>
            </div>
        </div>

        {{-- Media & Jadwal --}}
        <div>
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Media & Jadwal</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar</label>
                    @if($program->image)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ asset('storage/'.$program->image) }}" onerror="this.style.display='none'" class="h-16 w-28 object-cover rounded-lg border">
                        <span class="text-xs text-gray-400">Gambar saat ini</span>
                    </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $program->start_date?->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Berakhir</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $program->end_date?->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                </div>
            </div>
        </div>

        {{-- Visibilitas --}}
        <div>
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Visibilitas</h2>
            <div class="flex flex-wrap gap-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition-colors"></div>
                        <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Program Aktif <span class="text-gray-400 font-normal">(tampil di halaman program)</span></span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary-500 transition-colors"></div>
                        <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Tampilkan di Hero Slider <span class="text-gray-400 font-normal">(muncul di landing page)</span></span>
                </label>
            </div>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 text-sm">
            <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl hover:-translate-y-0.5 transition-all shadow-lg shadow-orange-200">
                <i class="fas fa-save mr-2"></i>Update Program
            </button>
            <a href="{{ route('admin.program.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
