@extends('layouts.admin')
@section('title', 'Edit Program - Admin')
@section('content')
<a href="{{ route('admin.program.index') }}" class="text-sm text-gray-500 hover:text-primary-500 mb-4 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h1 class="text-xl font-bold text-dark-500 mb-6">Edit Program: {{ $program->title }}</h1>
    <form method="POST" action="{{ route('admin.program.update', $program) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Judul Program</label><input type="text" name="title" value="{{ $program->title }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Pilar</label><select name="pillar_id" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">@foreach($pillars as $p)<option value="{{ $p->id }}" {{ $program->pillar_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>@endforeach</select></div>
            <div class="col-span-full"><label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label><textarea name="description" rows="3" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500">{{ $program->description }}</textarea></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Target (Rp)</label><input type="number" name="target_amount" value="{{ $program->target_amount }}" min="0" required class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:border-primary-500"></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Gambar Baru</label><input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none"></div>
            <div><label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ $program->is_active ? 'checked' : '' }} class="w-4 h-4 text-primary-500 rounded"><span class="text-sm">Aktif</span></label></div>
            <div><label class="flex items-center gap-2"><input type="checkbox" name="is_featured" value="1" {{ $program->is_featured ? 'checked' : '' }} class="w-4 h-4 text-primary-500 rounded"><span class="text-sm">Featured</span></label></div>
        </div>
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl hover:-translate-y-0.5 transition-all">Update Program</button>
    </form>
</div>
@endsection
