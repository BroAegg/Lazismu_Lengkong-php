@extends('layouts.admin')
@section('title', 'Kelola Program - Admin')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-bold text-dark-500">Kelola Program</h1>
    <a href="{{ route('admin.program.create') }}" class="px-4 py-2 bg-primary-500 text-white font-semibold rounded-xl text-sm hover:bg-primary-600"><i class="fas fa-plus mr-1"></i> Tambah</a>
</div>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead><tr class="border-b border-gray-200"><th class="text-left py-3 px-2">Program</th><th class="text-left py-3 px-2">Pilar</th><th class="text-right py-3 px-2">Target</th><th class="text-right py-3 px-2">Terkumpul</th><th class="text-center py-3 px-2">Status</th><th class="text-center py-3 px-2">Aksi</th></tr></thead>
            <tbody>
                @forelse($programs as $p)
                <tr class="border-b border-gray-50">
                    <td class="py-3 px-2 font-medium">{{ $p->title }}</td>
                    <td class="py-3 px-2">{{ $p->pillar?->name ?? '-' }}</td>
                    <td class="py-3 px-2 text-right">Rp {{ number_format($p->target_amount, 0, ',', '.') }}</td>
                    <td class="py-3 px-2 text-right font-bold text-primary-500">Rp {{ number_format($p->collected_amount, 0, ',', '.') }}</td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $p->is_active ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $p->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td class="py-3 px-2 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.program.edit', $p) }}" class="text-blue-500 text-xs"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.program.destroy', $p) }}" onsubmit="return confirm('Hapus program?')">@csrf @method('DELETE')<button class="text-red-500 text-xs"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-8 text-gray-400">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $programs->links() }}</div>
</div>
@endsection
