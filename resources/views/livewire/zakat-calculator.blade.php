<div class="w-full font-sans" x-data>

    {{-- ── Progress Bar ─────────────────────────────────────────── --}}
    <div class="mb-8">
        <div class="flex items-center justify-between mb-3">
            @php
                $steps = [1 => 'Pilih Jenis', 2 => 'Isi Data', 3 => 'Hasil'];
            @endphp
            @foreach($steps as $num => $label)
            <div class="flex items-center gap-2 {{ $num < count($steps) ? 'flex-1' : '' }}">
                <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-extrabold shrink-0 transition-all duration-300
                    {{ $step >= $num ? 'bg-gradient-to-br from-[#F7941D] to-[#F15A24] text-white shadow-lg shadow-orange-200' : 'bg-gray-100 text-gray-400' }}">
                    @if($step > $num)
                        <i class="fas fa-check text-xs"></i>
                    @else
                        {{ $num }}
                    @endif
                </div>
                <span class="text-xs font-bold hidden sm:inline {{ $step >= $num ? 'text-[#1A1A2E]' : 'text-gray-400' }}">{{ $label }}</span>
                @if($num < count($steps))
                <div class="flex-1 h-1 mx-3 rounded-full {{ $step > $num ? 'bg-gradient-to-r from-[#F7941D] to-[#F15A24]' : 'bg-gray-100' }} transition-all duration-500"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- STEP 1 — Pilih Jenis Zakat                                     --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    @if($step === 1)
    <div>
        <h2 class="text-2xl font-extrabold text-[#1A1A2E] mb-2">Pilih Jenis Zakat</h2>
        <p class="text-gray-500 mb-8 text-sm leading-relaxed">Setiap jenis zakat memiliki cara hitung berbeda. Pilih yang sesuai dengan kondisi Anda.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            {{-- Penghasilan --}}
            <button wire:click="selectType('penghasilan')"
                class="group p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-orange-400 hover:shadow-xl hover:shadow-orange-100 transition-all duration-300 text-left w-full">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500 text-2xl shrink-0 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-extrabold text-[#1A1A2E] text-base mb-1 group-hover:text-orange-600 transition-colors">Zakat Penghasilan</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Untuk karyawan, PNS, freelancer, & profesional. Dibayar tiap bulan saat gajian.</p>
                        <span class="inline-block mt-2 px-2.5 py-1 bg-orange-50 text-orange-600 text-[10px] font-bold rounded-full border border-orange-100">2.5% per tahun</span>
                    </div>
                </div>
            </button>

            {{-- Maal --}}
            <button wire:click="selectType('maal')"
                class="group p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-400 hover:shadow-xl hover:shadow-blue-100 transition-all duration-300 text-left w-full">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 text-2xl shrink-0 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-extrabold text-[#1A1A2E] text-base mb-1 group-hover:text-blue-600 transition-colors">Zakat Maal (Harta)</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Tabungan, deposito, & investasi yang sudah dimiliki ≥ 1 tahun (haul).</p>
                        <span class="inline-block mt-2 px-2.5 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-full border border-blue-100">2.5% dari harta bersih</span>
                    </div>
                </div>
            </button>

            {{-- Emas --}}
            <button wire:click="selectType('emas')"
                class="group p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-yellow-400 hover:shadow-xl hover:shadow-yellow-100 transition-all duration-300 text-left w-full">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 text-2xl shrink-0 group-hover:bg-yellow-400 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-extrabold text-[#1A1A2E] text-base mb-1 group-hover:text-yellow-600 transition-colors">Zakat Emas & Perak</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Emas/perak simpanan (bukan perhiasan dipakai) yang sudah dimiliki ≥ 1 tahun.</p>
                        <span class="inline-block mt-2 px-2.5 py-1 bg-yellow-50 text-yellow-700 text-[10px] font-bold rounded-full border border-yellow-100">Nisab: 85g emas</span>
                    </div>
                </div>
            </button>

            {{-- Fitrah --}}
            <button wire:click="selectType('fitrah')"
                class="group p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-green-400 hover:shadow-xl hover:shadow-green-100 transition-all duration-300 text-left w-full">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-500 text-2xl shrink-0 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-moon"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-extrabold text-[#1A1A2E] text-base mb-1 group-hover:text-green-600 transition-colors">Zakat Fitrah</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Wajib setiap jiwa yang mampu di bulan Ramadhan. Dibayar sebelum Sholat Idul Fitri.</p>
                        <span class="inline-block mt-2 px-2.5 py-1 bg-green-50 text-green-700 text-[10px] font-bold rounded-full border border-green-100">Per jiwa</span>
                    </div>
                </div>
            </button>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6 flex items-center justify-center gap-2">
            <i class="fas fa-book-open text-primary"></i>
            Perhitungan sesuai fatwa MUI & Fiqh Zakat Jumhur Ulama
        </p>
    </div>
    @endif

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- STEP 2 — Input Data                                            --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    @if($step === 2)
    <div>
        <button wire:click="$set('step', 1)" class="flex items-center gap-2 text-sm text-gray-400 hover:text-orange-500 font-medium mb-6 transition-colors">
            <i class="fas fa-arrow-left text-xs"></i> Pilih jenis lain
        </button>

        {{-- ── Penghasilan ── --}}
        @if($type === 'penghasilan')
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500"><i class="fas fa-briefcase"></i></div>
            <div>
                <h2 class="text-xl font-extrabold text-[#1A1A2E]">Zakat Penghasilan</h2>
                <p class="text-xs text-gray-400">Dikenakan 2.5% dari penghasilan bersih setahun jika ≥ nisab</p>
            </div>
        </div>

        <div class="bg-orange-50 border border-orange-100 rounded-2xl p-4 mb-6 flex items-start gap-3">
            <i class="fas fa-info-circle text-orange-400 mt-0.5 shrink-0"></i>
            <p class="text-xs text-orange-700 leading-relaxed">
                <strong>Nisab Zakat Penghasilan</strong> = 85 gram emas ≈ <strong>Rp 148.750.000/tahun</strong>
                (≈ Rp 12.396.000/bulan) · Harga emas Rp 1.750.000/gram
            </p>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-2">Gaji / Penghasilan Pokok <span class="text-red-400">*</span></label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="gaji_bulanan" placeholder="5.000.000" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-orange-400 focus:bg-white focus:outline-none transition-all text-lg font-bold text-[#1A1A2E]">
                </div>
                @error('gaji_bulanan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-2">Pendapatan Lain-lain per Bulan <span class="text-gray-400 font-normal">(opsional)</span></label>
                <p class="text-xs text-gray-400 mb-2">Bonus, THR, freelance, sewa, dll.</p>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="pendapatan_lain" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-orange-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-2">Pengeluaran Kebutuhan Pokok per Bulan <span class="text-gray-400 font-normal">(opsional)</span></label>
                <p class="text-xs text-gray-400 mb-2">Kebutuhan dasar: makan, sewa, transportasi, dsb.</p>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="pengeluaran" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-orange-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>
        </div>
        @endif

        {{-- ── Maal ── --}}
        @if($type === 'maal')
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500"><i class="fas fa-piggy-bank"></i></div>
            <div>
                <h2 class="text-xl font-extrabold text-[#1A1A2E]">Zakat Maal (Harta)</h2>
                <p class="text-xs text-gray-400">2.5% dari harta bersih yang sudah dimiliki ≥ 1 tahun (haul)</p>
            </div>
        </div>

        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 mb-6 flex items-start gap-3">
            <i class="fas fa-info-circle text-blue-400 mt-0.5 shrink-0"></i>
            <p class="text-xs text-blue-700 leading-relaxed">
                <strong>Syarat haul:</strong> harta sudah dimiliki selama 1 tahun hijriah (± 354 hari).
                <strong>Nisab:</strong> 85 gram emas ≈ <strong>Rp 148.750.000</strong>.
                Hutang jatuh tempo dikurangkan dari total harta.
            </p>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1">Tabungan & Deposito</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="tabungan" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1">Investasi (Saham, Reksa Dana, dll)</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="investasi" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1">Piutang yang Dapat Diharapkan Kembali</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="piutang_lancar" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1 flex items-center gap-2">
                    Hutang Jatuh Tempo (dikurangkan)
                    <span class="text-xs font-normal text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">pengurang</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                    <input type="number" wire:model="hutang_lancar" placeholder="0" min="0"
                        class="w-full pl-10 pr-4 py-4 bg-red-50 border-2 border-red-100 rounded-xl focus:border-red-300 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                </div>
            </div>
        </div>
        @endif

        {{-- ── Emas & Perak ── --}}
        @if($type === 'emas')
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600"><i class="fas fa-coins"></i></div>
            <div>
                <h2 class="text-xl font-extrabold text-[#1A1A2E]">Zakat Emas & Perak</h2>
                <p class="text-xs text-gray-400">2.5% dari total nilai emas & perak jika ≥ nisab 85g</p>
            </div>
        </div>

        <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4 mb-6 flex items-start gap-3">
            <i class="fas fa-info-circle text-yellow-600 mt-0.5 shrink-0"></i>
            <p class="text-xs text-yellow-800 leading-relaxed">
                Yang dihitung adalah <strong>emas/perak simpanan</strong> (bukan perhiasan yang dipakai sehari-hari).
                Nisab emas = 85 gram · Nisab perak = 595 gram.
                Harga referensi: emas Rp 1.750.000/gr · perak Rp 16.000/gr.
            </p>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1">Berat Emas Simpanan (gram)</label>
                <input type="number" wire:model="berat_emas" step="0.01" placeholder="0" min="0"
                    class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-yellow-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1.5">
                    <i class="fas fa-info-circle text-yellow-400"></i>
                    Nisab emas = 85 gram ≈ Rp 148.750.000
                </p>
            </div>
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-1">Berat Perak Simpanan (gram) <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="number" wire:model="berat_perak" step="0.01" placeholder="0" min="0"
                    class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-yellow-400 focus:bg-white focus:outline-none transition-all font-semibold text-[#1A1A2E]">
                <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1.5">
                    <i class="fas fa-info-circle text-yellow-400"></i>
                    Nisab perak = 595 gram ≈ Rp 9.520.000
                </p>
            </div>
        </div>
        @endif

        {{-- ── Fitrah ── --}}
        @if($type === 'fitrah')
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center text-green-500"><i class="fas fa-moon"></i></div>
            <div>
                <h2 class="text-xl font-extrabold text-[#1A1A2E]">Zakat Fitrah</h2>
                <p class="text-xs text-gray-400">Wajib per jiwa di bulan Ramadhan, sebelum Sholat Idul Fitri</p>
            </div>
        </div>

        <div class="bg-green-50 border border-green-100 rounded-2xl p-4 mb-6 flex items-start gap-3">
            <i class="fas fa-info-circle text-green-500 mt-0.5 shrink-0"></i>
            <p class="text-xs text-green-800 leading-relaxed">
                Zakat fitrah = <strong>1 sha'</strong> makanan pokok (± 3,5 kg beras) per jiwa.
                Boleh dibayar dengan <strong>uang tunai</strong> senilai beras tersebut.
                Wajib bagi setiap Muslim yang mampu, termasuk bayi yang baru lahir.
            </p>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-3">Jumlah Jiwa (Tanggungan)</label>
                <div class="flex items-center gap-5">
                    <button type="button" wire:click="decrementJiwa"
                        class="w-12 h-12 rounded-2xl bg-gray-100 hover:bg-red-50 hover:text-red-500 flex items-center justify-center text-gray-600 text-xl font-bold transition-colors">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <div class="flex-1 text-center">
                        <span class="text-5xl font-extrabold text-[#1A1A2E]">{{ $jumlah_jiwa }}</span>
                        <p class="text-xs text-gray-400 mt-1">jiwa / tanggungan</p>
                    </div>
                    <button type="button" wire:click="incrementJiwa"
                        class="w-12 h-12 rounded-2xl bg-gray-100 hover:bg-green-50 hover:text-green-500 flex items-center justify-center text-gray-600 text-xl font-bold transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-[#1A1A2E] mb-3">Metode Pembayaran</label>
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" wire:click="$set('metode', 'uang')"
                        class="py-4 rounded-xl border-2 font-bold text-sm transition-all duration-200 flex flex-col items-center gap-2
                            {{ $metode === 'uang' ? 'border-green-400 bg-green-50 text-green-700' : 'border-gray-200 text-gray-500 hover:border-green-200' }}">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                        <span>Uang Tunai</span>
                        <span class="text-[10px] font-normal opacity-70">Sesuai ketentuan Baznas</span>
                    </button>
                    <button type="button" wire:click="$set('metode', 'beras')"
                        class="py-4 rounded-xl border-2 font-bold text-sm transition-all duration-200 flex flex-col items-center gap-2
                            {{ $metode === 'beras' ? 'border-green-400 bg-green-50 text-green-700' : 'border-gray-200 text-gray-500 hover:border-green-200' }}">
                        <i class="fas fa-wheat-awn text-xl"></i>
                        <span>Beras</span>
                        <span class="text-[10px] font-normal opacity-70">3,5 kg × harga lokal</span>
                    </button>
                </div>
            </div>
        </div>
        @endif

        {{-- ── Hitung Button ── --}}
        <div class="mt-8">
            <button wire:click="calculate" wire:loading.attr="disabled"
                class="w-full py-5 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-extrabold text-lg rounded-2xl shadow-lg shadow-orange-200 hover:shadow-orange-300 hover:-translate-y-0.5 transition-all duration-300 disabled:opacity-60 disabled:cursor-not-allowed">
                <span wire:loading.remove class="flex items-center justify-center gap-3">
                    <i class="fas fa-calculator"></i> Hitung Zakat Saya
                </span>
                <span wire:loading class="flex items-center justify-center gap-3">
                    <i class="fas fa-spinner fa-spin"></i> Menghitung...
                </span>
            </button>
        </div>
    </div>
    @endif

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- STEP 3 — Hasil Perhitungan                                     --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    @if($step === 3 && !empty($result))
    <div>
        {{-- Status Badge --}}
        @if($result['is_wajib'])
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-4 ring-4 ring-green-50">
                <i class="fas fa-check-circle text-green-500 text-4xl"></i>
            </div>
            <p class="text-green-600 font-extrabold text-lg">Alhamdulillah, Zakat Anda Wajib</p>
            <p class="text-gray-400 text-sm mt-1">Segera tunaikan agar harta menjadi berkah</p>
        </div>
        @else
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mb-4 ring-4 ring-amber-50">
                <i class="fas fa-exclamation-circle text-amber-500 text-4xl"></i>
            </div>
            <p class="text-amber-600 font-extrabold text-lg">Harta Belum Mencapai Nisab</p>
            <p class="text-gray-400 text-sm mt-1">Dianjurkan untuk bersedekah & infaq meski belum wajib zakat</p>
        </div>
        @endif

        {{-- Nominal Utama --}}
        <div class="bg-gradient-to-br from-[#1A1A2E] to-[#2D2D44] rounded-3xl p-8 text-white mb-6 text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-2xl -mr-10 -mt-10 pointer-events-none"></div>
            <p class="text-white/60 text-sm font-bold uppercase tracking-wider mb-3">
                {{ $result['is_wajib'] ? 'Zakat yang Wajib Dibayarkan' : 'Estimasi (Belum Wajib)' }}
            </p>
            <p class="text-4xl sm:text-5xl font-extrabold text-white mb-2">
                Rp {{ number_format($result['zakat_amount'], 0, ',', '.') }}
            </p>
            @if(isset($result['zakat_per_bulan']) && $result['zakat_per_bulan'] > 0)
            <p class="text-white/50 text-sm">
                ≈ <strong class="text-white/70">Rp {{ number_format($result['zakat_per_bulan'], 0, ',', '.') }}</strong> per bulan
            </p>
            @endif
            @if(isset($result['rate']) && $result['rate'])
            <div class="inline-block mt-4 px-4 py-1.5 bg-white/10 rounded-full text-white/70 text-xs font-bold border border-white/10">
                Tarif: {{ $result['rate'] }}% dari
                @if($result['type'] === 'penghasilan') penghasilan bersih setahun
                @elseif($result['type'] === 'maal') harta bersih
                @elseif($result['type'] === 'emas') total nilai emas & perak
                @endif
            </div>
            @endif
        </div>

        {{-- Rincian Perhitungan --}}
        <div class="bg-gray-50 rounded-2xl p-5 mb-6 border border-gray-100">
            <h4 class="text-sm font-extrabold text-[#1A1A2E] mb-4 flex items-center gap-2">
                <i class="fas fa-list-ul text-primary/60 text-xs"></i> Rincian Perhitungan
            </h4>
            <div class="space-y-2.5 text-sm">

                @if($result['type'] === 'penghasilan')
                <div class="flex justify-between"><span class="text-gray-500">Gaji per bulan</span><span class="font-semibold text-[#1A1A2E]">Rp {{ number_format($result['gaji_per_bulan'], 0, ',', '.') }}</span></div>
                @if($result['pendapatan_lain'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Pendapatan lain-lain</span><span class="font-semibold text-[#1A1A2E]">+ Rp {{ number_format($result['pendapatan_lain'], 0, ',', '.') }}</span></div>
                @endif
                @if($result['pengeluaran'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Pengeluaran pokok</span><span class="font-semibold text-red-500">- Rp {{ number_format($result['pengeluaran'], 0, ',', '.') }}</span></div>
                @endif
                <div class="border-t border-gray-200 pt-2 flex justify-between font-bold"><span class="text-gray-700">Penghasilan bersih/bulan</span><span>Rp {{ number_format($result['bersih_per_bulan'], 0, ',', '.') }}</span></div>
                <div class="flex justify-between font-bold text-orange-600"><span class="text-gray-700">Penghasilan bersih/tahun</span><span>Rp {{ number_format($result['total_per_tahun'], 0, ',', '.') }}</span></div>
                @endif

                @if($result['type'] === 'maal')
                <div class="flex justify-between"><span class="text-gray-500">Tabungan & Deposito</span><span class="font-semibold text-[#1A1A2E]">Rp {{ number_format($result['tabungan'], 0, ',', '.') }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Investasi</span><span class="font-semibold text-[#1A1A2E]">Rp {{ number_format($result['investasi'], 0, ',', '.') }}</span></div>
                @if($result['piutang'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Piutang lancar</span><span class="font-semibold text-[#1A1A2E]">+ Rp {{ number_format($result['piutang'], 0, ',', '.') }}</span></div>
                @endif
                @if($result['hutang'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Hutang jatuh tempo</span><span class="font-semibold text-red-500">- Rp {{ number_format($result['hutang'], 0, ',', '.') }}</span></div>
                @endif
                <div class="border-t border-gray-200 pt-2 flex justify-between font-bold text-blue-600"><span class="text-gray-700">Harta Bersih (dasar zakat)</span><span>Rp {{ number_format($result['harta_bersih'], 0, ',', '.') }}</span></div>
                @endif

                @if($result['type'] === 'emas')
                @if($result['berat_emas'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Emas {{ $result['berat_emas'] }} gram</span><span class="font-semibold text-[#1A1A2E]">Rp {{ number_format($result['nilai_emas'], 0, ',', '.') }}</span></div>
                @endif
                @if($result['berat_perak'] > 0)
                <div class="flex justify-between"><span class="text-gray-500">Perak {{ $result['berat_perak'] }} gram</span><span class="font-semibold text-[#1A1A2E]">Rp {{ number_format($result['nilai_perak'], 0, ',', '.') }}</span></div>
                @endif
                <div class="border-t border-gray-200 pt-2 flex justify-between font-bold text-yellow-700"><span class="text-gray-700">Total Nilai Emas & Perak</span><span>Rp {{ number_format($result['total_nilai'], 0, ',', '.') }}</span></div>
                @endif

                @if($result['type'] === 'fitrah')
                <div class="flex justify-between"><span class="text-gray-500">Jumlah jiwa</span><span class="font-semibold">{{ $result['jumlah_jiwa'] }} orang</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Per jiwa</span><span class="font-semibold">Rp {{ number_format($result['per_jiwa'], 0, ',', '.') }}</span></div>
                <div class="flex justify-between text-xs text-gray-400 italic"><span colspan="2">{{ $result['keterangan'] }}</span></div>
                @endif

                @if(isset($result['nisab_value']) && $result['nisab_value'] > 0)
                <div class="mt-2 pt-2 border-t border-dashed border-gray-300 flex justify-between text-xs">
                    <span class="text-gray-400">Nisab (patokan wajib zakat)</span>
                    <span class="font-bold {{ $result['is_wajib'] ? 'text-green-600' : 'text-amber-600' }}">
                        Rp {{ number_format($result['nisab_value'], 0, ',', '.') }}
                        @if($result['is_wajib']) ✓ Terpenuhi @else ✗ Belum terpenuhi @endif
                    </span>
                </div>
                @endif
            </div>
        </div>

        {{-- CTA --}}
        <div class="flex flex-col sm:flex-row gap-3">
            <button wire:click="resetCalculator"
                class="flex-1 py-4 border-2 border-gray-200 rounded-2xl font-bold text-gray-600 hover:border-orange-400 hover:text-orange-500 transition-all">
                <i class="fas fa-redo mr-2"></i>Hitung Ulang
            </button>
            @if($result['is_wajib'])
            <a href="{{ route('donasi') }}"
                class="flex-1 py-4 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold rounded-2xl text-center shadow-lg shadow-orange-200 hover:-translate-y-0.5 transition-all">
                <i class="fas fa-hand-holding-heart mr-2"></i>Bayar Zakat Sekarang
            </a>
            @else
            <a href="{{ route('donasi') }}"
                class="flex-1 py-4 bg-gradient-to-r from-emerald-500 to-green-500 text-white font-bold rounded-2xl text-center shadow-lg shadow-green-200 hover:-translate-y-0.5 transition-all">
                <i class="fas fa-heart mr-2"></i>Sedekah / Infaq Sekarang
            </a>
            @endif
        </div>

        <p class="text-center text-xs text-gray-400 mt-5 flex items-center justify-center gap-1.5">
            <i class="fas fa-shield-alt text-primary/50"></i>
            Hasil perhitungan bersifat indikatif sesuai Fiqh Jumhur Ulama. Konsultasikan kepada ustadz untuk kasus khusus.
        </p>
    </div>
    @endif

</div>
