@extends('layouts.admin')
@section('title', 'Kelola User - Admin')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-bold text-dark-500">Kelola User</h1>
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-primary-500 text-white font-semibold rounded-xl text-sm hover:bg-primary-600"><i class="fas fa-plus mr-1"></i> Tambah</a>
</div>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead><tr class="border-b border-gray-200"><th class="text-left py-3 px-2">Nama</th><th class="text-left py-3 px-2">Email</th><th class="text-center py-3 px-2">Role</th><th class="text-center py-3 px-2">Status</th><th class="text-center py-3 px-2">Aksi</th></tr></thead>
            <tbody>
                @forelse($users as $u)
                <tr class="border-b border-gray-50">
                    <td class="py-3 px-2 font-medium">{{ $u->name }}</td>
                    <td class="py-3 px-2">{{ $u->email }}</td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $u->role->badgeColor() }}">{{ $u->role->label() }}</span></td>
                    <td class="py-3 px-2 text-center"><span class="px-2 py-1 text-xs rounded-full {{ $u->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">{{ $u->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td class="py-3 px-2 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.users.edit', $u) }}" class="text-blue-500 text-xs"><i class="fas fa-edit"></i></a>
                        @if($u->id !== auth()->id())<form method="POST" action="{{ route('admin.users.destroy', $u) }}" onsubmit="return confirm('Hapus user?')">@csrf @method('DELETE')<button class="text-red-500 text-xs"><i class="fas fa-trash"></i></button></form>@endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-8 text-gray-400">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
