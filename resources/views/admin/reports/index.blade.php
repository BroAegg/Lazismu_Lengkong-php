@extends('layouts.admin')
@section('title', 'Laporan - Admin')
@section('content')
<h1 class="text-xl font-bold text-dark-500 mb-6">Laporan PSAK 109</h1>
<form method="GET" class="flex flex-wrap items-end gap-4 mb-8">
    <div><label class="block text-sm font-medium text-gray-700 mb-1">Dari</label><input type="date" name="start_date" value="{{ $startDate }}" class="px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
    <div><label class="block text-sm font-medium text-gray-700 mb-1">Sampai</label><input type="date" name="end_date" value="{{ $endDate }}" class="px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
    <button type="submit" class="px-6 py-3 bg-primary-500 text-white font-bold rounded-xl">Filter</button>
    <a href="{{ route('admin.reports.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="px-6 py-3 bg-red-500 text-white font-bold rounded-xl"><i class="fas fa-file-pdf mr-1"></i> Export PDF</a>
</form>
<div class="grid lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="font-bold text-dark-500 mb-4">Penghimpunan</h2>
        <table class="w-full text-sm"><thead><tr class="border-b border-gray-200"><th class="text-left py-2">Jenis Dana</th><th class="text-right py-2">Total</th><th class="text-right py-2">Amil</th></tr></thead><tbody>
            @foreach($penghimpunan as $p)<tr class="border-b border-gray-50"><td class="py-2">{{ $p->psak_fund_type }}</td><td class="py-2 text-right font-bold">Rp {{ number_format($p->total, 0, ',', '.') }}</td><td class="py-2 text-right">Rp {{ number_format($p->amil, 0, ',', '.') }}</td></tr>@endforeach
        </tbody></table>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="font-bold text-dark-500 mb-4">Penyaluran</h2>
        <table class="w-full text-sm"><thead><tr class="border-b border-gray-200"><th class="text-left py-2">Asnaf</th><th class="text-right py-2">Total</th><th class="text-right py-2">Penerima</th></tr></thead><tbody>
            @foreach($penyaluran as $p)<tr class="border-b border-gray-50"><td class="py-2">{{ $p->asnaf_category }}</td><td class="py-2 text-right font-bold">Rp {{ number_format($p->total, 0, ',', '.') }}</td><td class="py-2 text-right">{{ $p->count }}</td></tr>@endforeach
        </tbody></table>
    </div>
</div>
@endsection
