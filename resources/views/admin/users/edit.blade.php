@extends('layouts.admin')
@section('title', 'Edit User - Admin')
@section('content')
<a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:text-primary-500 mb-4 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h1 class="text-xl font-bold text-dark-500 mb-6">Edit User: {{ $user->name }}</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama</label><input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label><input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">No. HP</label><input type="text" name="phone" value="{{ $user->phone }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Role</label><select name="role" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">@foreach($roles as $r)<option value="{{ $r->value }}" {{ $user->role === $r ? 'selected' : '' }}>{{ $r->label() }}</option>@endforeach</select></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Password Baru (kosongkan jika tidak diubah)</label><input type="password" name="password" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="flex items-center gap-2 mt-6"><input type="checkbox" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }} class="w-4 h-4 text-primary-500 rounded"><span class="text-sm">Aktif</span></label></div>
        </div>
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl hover:-translate-y-0.5 transition-all">Update User</button>
    </form>
</div>
@endsection
