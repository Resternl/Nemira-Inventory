@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-6 px-4">
    <a href="{{ route('inventory.index') }}" class="inline-flex items-center gap-2 bg-[#003CBB] text-white px-3 py-1.5 rounded-xl shadow-sm hover:bg-[#003199] transition mb-8 text-lg font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Back To List
    </a>

    <h1 class="text-2xl font-bold text-[#111] mb-6">Add New Product</h1>

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-lg">
        <form action="{{ isset($item) ? route('inventory.update', $item->id) : route('inventory.store') }}" method="POST">
            @csrf 
            @if(isset($item)) @method('PUT') @endif

            <div class="flex flex-col lg:flex-row gap-10">
                <div class="flex-1 space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">nama produk</label>
                        <input type="text" name="nama_item" value="{{ old('nama_item', $item->nama_item ?? '') }}" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#003CBB] outline-none transition shadow-sm" placeholder="Masukkan nama barang" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Kode barang</label>
                        <input type="text" name="kode_item" value="{{ old('kode_item', $item->kode_item ?? '') }}" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#003CBB] outline-none transition shadow-sm" placeholder="Contoh: INV-001" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">jenis barang</label>
                            <input type="text" name="jenis_item" value="{{ old('jenis_item', $item->jenis_item ?? '') }}" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#003CBB] outline-none transition shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Jumlah</label>
                            <input type="number" name="jumlah_item" value="{{ old('jumlah_item', $item->jumlah_item ?? '') }}" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#003CBB] outline-none transition shadow-sm" required>
                        </div>
                    </div>
                </div>

                <div class="flex-[1.2] flex flex-col">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#003CBB] outline-none flex-grow min-h-[300px] shadow-sm" placeholder="Tulis deskripsi detail produk..." required>{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-gray-100 text-right">
                <button type="submit" class="bg-slate-900 text-white px-10 py-3.5 rounded-xl text-ls font-bold hover:bg-slate-800 shadow-md transition uppercase tracking-wider">
                    {{ isset($item) ? 'Simpan' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection