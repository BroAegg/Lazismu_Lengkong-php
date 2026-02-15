<div class="max-w-2xl mx-auto">
    {{-- Progress steps --}}
    <div class="flex items-center justify-center gap-2 mb-8">
        @for($i = 1; $i <= 3; $i++)
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold {{ $step >= $i ? 'bg-primary-500 text-white' : 'bg-gray-200 text-gray-500' }}">{{ $i }}</div>
            @if($i < 3)<div class="w-8 h-0.5 {{ $step > $i ? 'bg-primary-500' : 'bg-gray-200' }}"></div>@endif
        </div>
        @endfor
    </div>

    {{-- STEP 1: Pilih Jenis Zakat --}}
    @if($step === 1)
    <div class="space-y-4" data-aos="fade-up">
        <h2 class="text-xl font-bold text-dark-500 text-center mb-6">Pilih Jenis Zakat</h2>
        <div class="grid gap-4">
            <button wire:click="selectType('penghasilan')" class="p-5 bg-white rounded-2xl border-2 border-gray-100 hover:border-primary-500 transition-all text-left group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-primary-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-briefcase text-primary-500"></i></div>
                    <div><p class="font-bold text-dark-500 group-hover:text-primary-500">Zakat Penghasilan</p><p class="text-sm text-gray-500">2.5% dari penghasilan bersih per tahun</p></div>
                </div>
            </button>
            <button wire:click="selectType('emas')" class="p-5 bg-white rounded-2xl border-2 border-gray-100 hover:border-primary-500 transition-all text-left group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-coins text-yellow-500"></i></div>
                    <div><p class="font-bold text-dark-500 group-hover:text-primary-500">Zakat Emas & Perak</p><p class="text-sm text-gray-500">2.5% jika mencapai nisab 85 gram emas</p></div>
                </div>
            </button>
            <button wire:click="selectType('fitrah')" class="p-5 bg-white rounded-2xl border-2 border-gray-100 hover:border-primary-500 transition-all text-left group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-seedling text-green-500"></i></div>
                    <div><p class="font-bold text-dark-500 group-hover:text-primary-500">Zakat Fitrah</p><p class="text-sm text-gray-500">Wajib per jiwa di bulan Ramadhan</p></div>
                </div>
            </button>
        </div>
    </div>
    @endif

    {{-- STEP 2: Input Data --}}
    @if($step === 2)
    <div data-aos="fade-up">
        <button wire:click="$set('step', 1)" class="text-sm text-gray-500 hover:text-primary-500 mb-4"><i class="fas fa-arrow-left mr-1"></i> Pilih jenis lain</button>

        @if($type === 'penghasilan')
        <h2 class="text-xl font-bold text-dark-500 mb-6"><i class="fas fa-briefcase text-primary-500 mr-2"></i>Zakat Penghasilan</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gaji/Pendapatan per Bulan *</label>
                <div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">Rp</span>
                <input type="number" wire:model="gaji_bulanan" placeholder="5000000" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
                @error('gaji_bulanan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pendapatan Lain per Bulan</label>
                <div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">Rp</span>
                <input type="number" wire:model="pendapatan_lain" placeholder="0" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pengeluaran Pokok per Bulan</label>
                <div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">Rp</span>
                <input type="number" wire:model="pengeluaran" placeholder="0" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            </div>
        </div>

        @elseif($type === 'emas')
        <h2 class="text-xl font-bold text-dark-500 mb-6"><i class="fas fa-coins text-yellow-500 mr-2"></i>Zakat Emas & Perak</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Berat Emas (gram)</label>
                <input type="number" wire:model="berat_emas" step="0.01" placeholder="0" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Berat Perak (gram)</label>
                <input type="number" wire:model="berat_perak" step="0.01" placeholder="0" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
            </div>
        </div>

        @elseif($type === 'fitrah')
        <h2 class="text-xl font-bold text-dark-500 mb-6"><i class="fas fa-seedling text-green-500 mr-2"></i>Zakat Fitrah</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Jiwa</label>
                <div class="flex items-center gap-4">
                    <button wire:click="decrementJiwa" class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center"><i class="fas fa-minus text-sm"></i></button>
                    <span class="text-2xl font-bold text-dark-500 w-12 text-center">{{ $jumlah_jiwa }}</span>
                    <button wire:click="incrementJiwa" class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center"><i class="fas fa-plus text-sm"></i></button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                <div class="flex gap-3">
                    <button wire:click="$set('metode', 'uang')" class="flex-1 py-3 rounded-xl border-2 font-medium text-sm {{ $metode === 'uang' ? 'border-primary-500 bg-primary-500/5 text-primary-500' : 'border-gray-200 text-gray-500' }}"><i class="fas fa-money-bill mr-1"></i> Uang</button>
                    <button wire:click="$set('metode', 'beras')" class="flex-1 py-3 rounded-xl border-2 font-medium text-sm {{ $metode === 'beras' ? 'border-primary-500 bg-primary-500/5 text-primary-500' : 'border-gray-200 text-gray-500' }}"><i class="fas fa-wheat-awn mr-1"></i> Beras</button>
                </div>
            </div>
        </div>
        @endif

        <button wire:click="calculate" wire:loading.attr="disabled" class="w-full mt-6 py-4 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-2xl hover:-translate-y-0.5 transition-all">
            <span wire:loading.remove>Hitung Zakat <i class="fas fa-arrow-right ml-1"></i></span>
            <span wire:loading><i class="fas fa-spinner fa-spin mr-1"></i> Menghitung...</span>
        </button>
    </div>
    @endif

    {{-- STEP 3: Hasil --}}
    @if($step === 3 && !empty($result))
    <div data-aos="fade-up" class="text-center">
        {{-- Status --}}
        @if($result['is_wajib'])
        <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-check-circle text-green-500 text-3xl"></i></div>
        <p class="text-green-600 font-semibold mb-2">Alhamdulillah, zakat Anda wajib ditunaikan</p>
        @else
        <div class="w-20 h-20 mx-auto bg-yellow-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-info-circle text-yellow-500 text-3xl"></i></div>
        <p class="text-yellow-600 font-semibold mb-2">Harta Anda belum mencapai nisab</p>
        @endif

        {{-- Amount --}}
        <div class="bg-gradient-to-r from-primary-500 to-accent-500 rounded-2xl p-6 text-white my-6">
            <p class="text-white/70 text-sm mb-1">{{ $result['is_wajib'] ? 'Zakat yang Harus Dibayarkan' : 'Estimasi Zakat (jika ditunaikan)' }}</p>
            <p class="text-3xl font-bold">Rp {{ number_format($result['zakat_amount'], 0, ',', '.') }}</p>
            @if(isset($result['zakat_per_bulan']) && $result['zakat_per_bulan'] > 0)
            <p class="text-white/70 text-sm mt-1">≈ Rp {{ number_format($result['zakat_per_bulan'], 0, ',', '.') }} / bulan</p>
            @endif
        </div>

        {{-- Detail cards --}}
        <div class="grid grid-cols-2 gap-3 mb-6">
            @if(isset($result['nisab_value']))
            <div class="bg-white rounded-xl border border-gray-100 p-4 text-left">
                <p class="text-xs text-gray-500">Nisab</p>
                <p class="font-bold text-sm">Rp {{ number_format($result['nisab_value'], 0, ',', '.') }}</p>
            </div>
            @endif
            @if(isset($result['total_per_tahun']))
            <div class="bg-white rounded-xl border border-gray-100 p-4 text-left">
                <p class="text-xs text-gray-500">Penghasilan/Tahun</p>
                <p class="font-bold text-sm">Rp {{ number_format($result['total_per_tahun'], 0, ',', '.') }}</p>
            </div>
            @endif
            @if(isset($result['total_nilai']))
            <div class="bg-white rounded-xl border border-gray-100 p-4 text-left">
                <p class="text-xs text-gray-500">Total Nilai</p>
                <p class="font-bold text-sm">Rp {{ number_format($result['total_nilai'], 0, ',', '.') }}</p>
            </div>
            @endif
            @if(isset($result['per_jiwa']))
            <div class="bg-white rounded-xl border border-gray-100 p-4 text-left">
                <p class="text-xs text-gray-500">Per Jiwa</p>
                <p class="font-bold text-sm">Rp {{ number_format($result['per_jiwa'], 0, ',', '.') }}</p>
            </div>
            @endif
            <div class="bg-white rounded-xl border border-gray-100 p-4 text-left">
                <p class="text-xs text-gray-500">Tarif Zakat</p>
                <p class="font-bold text-sm">{{ $result['rate'] ?? '-' }}%</p>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex gap-3">
            <button wire:click="resetCalculator" class="flex-1 py-3 border-2 border-gray-200 rounded-xl font-medium text-gray-600 hover:border-primary-500 hover:text-primary-500 transition-colors"><i class="fas fa-redo mr-1"></i> Hitung Ulang</button>
            @if($result['is_wajib'])
            <a href="{{ route('donasi') }}" class="flex-1 py-3 bg-gradient-to-r from-secondary-500 to-green-500 text-white font-bold rounded-xl text-center hover:-translate-y-0.5 transition-all"><i class="fas fa-hand-holding-heart mr-1"></i> Bayar Zakat</a>
            @endif
        </div>
    </div>
    @endif
</div>
