@extends('layouts.admin')
@section('title', 'Pengaturan - Admin')

@push('styles')
<style>
    .tab-btn.active { background: #F7941D; color: white; }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
</style>
@endpush

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-dark-500">Pengaturan</h1>
        <p class="text-sm text-gray-400 mt-0.5">Kelola konten dan konfigurasi sistem</p>
    </div>
</div>

@if(session('success'))
<div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-2">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

{{-- Tabs --}}
<div class="flex flex-wrap gap-2 mb-6">
    @php $tabOrder = ['beranda','general','bank','zakat','amil']; @endphp
    @foreach($tabOrder as $i => $grp)
    @if($settings->has($grp))
    <button onclick="switchTab('{{ $grp }}')" id="tab-{{ $grp }}"
        class="tab-btn px-4 py-2 rounded-xl text-sm font-semibold border border-gray-200 transition-all {{ $i===0?'active':'' }}">
        @switch($grp)
            @case('beranda') <i class="fas fa-home mr-1"></i> Halaman Utama @break
            @case('general') <i class="fas fa-building mr-1"></i> Organisasi @break
            @case('bank')    <i class="fas fa-university mr-1"></i> Rekening @break
            @case('zakat')   <i class="fas fa-calculator mr-1"></i> Zakat @break
            @case('amil')    <i class="fas fa-percent mr-1"></i> Amil @break
            @default {{ $grp }}
        @endswitch
    </button>
    @endif
    @endforeach
</div>

{{-- Tab Contents --}}
@foreach($tabOrder as $i => $grp)
@if($settings->has($grp))
<div id="content-{{ $grp }}" class="tab-content {{ $i===0?'active':'' }}">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h2 class="font-bold text-dark-500">{{ $groupLabels[$grp] ?? ucfirst($grp) }}</h2>
            </div>

            @if($grp === 'beranda')
            {{-- Konten Beranda — grouped by sub-section --}}
            @php
            $berandaSections = [
                'Cara Berdonasi' => ['beranda_cara_heading','beranda_cara_desc','beranda_cara_step1_title','beranda_cara_step1_desc','beranda_cara_step2_title','beranda_cara_step2_desc','beranda_cara_step3_title','beranda_cara_step3_desc'],
                'Kotak CTA Donasi (Samping Feed)' => ['beranda_cta_badge','beranda_cta_heading','beranda_cta_desc'],
                'Section Kalkulator' => ['beranda_kalkulator_heading','beranda_kalkulator_desc'],
                'Section Tentang Kami' => ['beranda_tentang_heading','beranda_tentang_desc'],
                'CTA Bawah Halaman' => ['beranda_finalcta_heading','beranda_finalcta_desc'],
            ];
            @endphp
            @foreach($berandaSections as $sectionLabel => $keys)
            <div class="px-6 pt-5 pb-2">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="h-px flex-1 bg-gray-100"></span>
                    {{ $sectionLabel }}
                    <span class="h-px flex-1 bg-gray-100"></span>
                </h3>
                <div class="space-y-4">
                    @foreach($keys as $k)
                    @php $s = $settings[$grp]->firstWhere('key',$k); @endphp
                    @if($s)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $s->description ?? $s->key }}
                        </label>
                        @if(str_ends_with($s->key,'_desc') && strlen($s->value) > 80)
                        <textarea name="{{ $s->key }}" rows="3"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500 text-sm resize-y">{{ $s->value }}</textarea>
                        @else
                        <input type="text" name="{{ $s->key }}" value="{{ $s->value }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500 text-sm">
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="h-4"></div>

            @else
            {{-- Other groups — generic list --}}
            <div class="p-6 space-y-4">
                @foreach($settings[$grp] as $s)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-700">{{ $s->description ?? $s->key }}</p>
                        <p class="text-xs text-gray-400 font-mono">{{ $s->key }}</p>
                    </div>
                    <div class="md:col-span-2">
                        @if($s->type === 'boolean')
                        <select name="{{ $s->key }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl text-sm outline-none focus:border-primary-500">
                            <option value="1" {{ $s->value=='1'?'selected':'' }}>Ya</option>
                            <option value="0" {{ $s->value=='0'?'selected':'' }}>Tidak</option>
                        </select>
                        @elseif(in_array($s->type,['integer','float']))
                        <input type="number" step="{{ $s->type==='float'?'0.01':'1' }}" name="{{ $s->key }}" value="{{ $s->value }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl text-sm outline-none focus:border-primary-500">
                        @else
                        <input type="text" name="{{ $s->key }}" value="{{ $s->value }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl text-sm outline-none focus:border-primary-500">
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center gap-3">
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl hover:-translate-y-0.5 transition-all shadow-sm shadow-orange-200 text-sm">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
                <span class="text-xs text-gray-400">Perubahan langsung tampil di website</span>
            </div>
        </div>
    </form>
</div>
@endif
@endforeach

@push('scripts')
<script>
function switchTab(name) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
    document.getElementById('tab-'+name).classList.add('active');
    document.getElementById('content-'+name).classList.add('active');
}
</script>
@endpush
@endsection
