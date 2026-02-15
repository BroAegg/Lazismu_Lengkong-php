@extends('layouts.admin')
@section('title', 'Tambah User - Admin')
@section('content')
<a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:text-primary-500 mb-4 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h1 class="text-xl font-bold text-dark-500 mb-6">Tambah User</h1>
    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama</label><input type="text" name="name" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label><input type="email" name="email" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">No. HP</label><input type="text" name="phone" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Role</label><select name="role" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">@foreach($roles as $r)<option value="{{ $r->value }}">{{ $r->label() }}</option>@endforeach</select></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Password</label><input type="password" name="password" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
        </div>
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl hover:-translate-y-0.5 transition-all">Simpan User</button>
    </form>
</div>
@endsection
