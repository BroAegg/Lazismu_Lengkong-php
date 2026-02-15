<div>
    <form wire:submit="submit" class="space-y-6">
        {{-- Preset Amounts --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Pilih Nominal</label>
            <div class="grid grid-cols-3 gap-2">
                @foreach($presetAmounts as $preset)
                <button type="button" wire:click="selectPreset({{ $preset }})"
                    class="py-3 rounded-xl border-2 text-sm font-bold transition-all {{ (int)$amount === $preset ? 'border-primary-500 bg-primary-500/5 text-primary-500' : 'border-gray-200 text-gray-600 hover:border-primary-500' }}">
                    Rp {{ number_format($preset, 0, ',', '.') }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Custom Amount --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Atau masukkan nominal lain</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                <input type="number" wire:model.live="amount" min="10000" placeholder="10000"
                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500 text-lg font-bold">
            </div>
            @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Donasi *</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($categories as $cat)
                <button type="button" wire:click="$set('categoryId', {{ $cat->id }})"
                    class="p-3 rounded-xl border-2 text-sm font-medium transition-all text-left {{ $categoryId == $cat->id ? 'border-primary-500 bg-primary-500/5 text-primary-500' : 'border-gray-200 text-gray-600 hover:border-gray-300' }}">
                    <span class="inline-block w-3 h-3 rounded-full mr-1" style="background:{{ $cat->color }}"></span>
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>
            @error('categoryId') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Payment Method --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran *</label>
            <div class="space-y-2">
                @foreach($paymentMethods as $pm)
                <button type="button" wire:click="$set('payment_method', '{{ $pm->value }}')"
                    class="w-full flex items-center gap-3 p-3 rounded-xl border-2 transition-all {{ $payment_method === $pm->value ? 'border-primary-500 bg-primary-500/5' : 'border-gray-200 hover:border-gray-300' }}">
                    <i class="{{ $pm->icon() }} text-lg {{ $payment_method === $pm->value ? 'text-primary-500' : 'text-gray-400' }}"></i>
                    <span class="font-medium text-sm {{ $payment_method === $pm->value ? 'text-primary-500' : 'text-gray-600' }}">{{ $pm->label() }}</span>
                </button>
                @endforeach
            </div>
            @error('payment_method') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Donor Info --}}
        <div class="space-y-3">
            <h3 class="font-semibold text-dark-500">Data Donatur</h3>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Nama Lengkap *</label>
                <input type="text" wire:model="donor_name" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                @error('donor_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Email *</label>
                <input type="email" wire:model="donor_email" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
                @error('donor_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">No. WhatsApp</label>
                <input type="text" wire:model="donor_phone" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">
            </div>
        </div>

        {{-- Message --}}
        <div>
            <label class="block text-sm text-gray-600 mb-1">Doa / Pesan (opsional)</label>
            <textarea wire:model="message" rows="3" maxlength="500" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500" placeholder="Semoga menjadi ladang pahala..."></textarea>
        </div>

        {{-- Anonymous --}}
        <label class="flex items-center gap-3 cursor-pointer">
            <input type="checkbox" wire:model="is_anonymous" class="w-4 h-4 text-primary-500 rounded">
            <span class="text-sm text-gray-600">Sembunyikan nama saya (donasi anonim)</span>
        </label>

        {{-- Summary --}}
        @if($amount)
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-600">Total Donasi</span>
                <span class="text-xl font-bold text-primary-500">Rp {{ number_format((int)$amount, 0, ',', '.') }}</span>
            </div>
        </div>
        @endif

        {{-- Submit --}}
        <button type="submit" wire:loading.attr="disabled"
            class="w-full py-4 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-2xl hover:-translate-y-0.5 transition-all disabled:opacity-50">
            <span wire:loading.remove>Lanjutkan Pembayaran <i class="fas fa-arrow-right ml-1"></i></span>
            <span wire:loading><i class="fas fa-spinner fa-spin mr-1"></i> Memproses...</span>
        </button>
    </form>
</div>
