@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-6 px-4">
    <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-4">
        <h1 class="text-2xl font-bold text-[#111]">Inventory List</h1>
        <a href="{{ route('inventory.create') }}" class="bg-[#003CBB] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#003199] transition font-medium">
            <span class="text-xl">+</span> Add new Product
        </a>
    </div>

    <div class="grid grid-cols-[2fr_1.2fr_1.2fr_0.6fr_1.2fr] gap-4 px-4 py-2 text-sm font-bold text-gray-600 uppercase tracking-wider">
        <div>Nama Produk</div>
        <div>Kode Barang</div>
        <div>Jenis</div>
        <div class="text-center">Jumlah</div>
        <div class="text-center">Aksi</div>
    </div>

    <div class="space-y-2">
        @forelse($inventory as $item)
        <div class="grid grid-cols-[2fr_1.2fr_1.2fr_0.6fr_1.2fr] gap-4 items-center bg-white p-2 rounded-xl border border-gray-200 shadow-sm hover:border-[#003CBB] transition">
            <div class="px-3 py-2 text-sm font-medium border border-gray-100 rounded-lg truncate bg-gray-50">{{ $item->nama_item }}</div>
            <div class="px-3 py-2 text-sm border border-gray-100 rounded-lg truncate text-gray-500">{{ $item->kode_item }}</div>
            <div class="px-3 py-2 text-sm border border-gray-100 rounded-lg truncate text-gray-500">{{ $item->jenis_item }}</div>
            <div class="px-3 py-2 text-sm border border-gray-100 rounded-lg text-center bg-blue-50 font-bold text-[#003CBB]">{{ $item->jumlah_item }}</div>
            
            <div class="flex gap-2 justify-center">
                <a href="{{ route('inventory.edit', $item->id) }}" class="bg-[#F6CF57] hover:bg-yellow-500 text-xs font-bold px-3 py-1.5 rounded-lg border border-yellow-600 transition">EDIT</a>
                <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus barang?')">
                    @csrf @method('DELETE')
                    <button class="bg-[#E50000] hover:bg-red-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg border border-red-800 transition">HAPUS</button>
                </form>
            </div>
        </div>
        @empty
        <div class="text-center py-10 text-gray-400 italic">Data kosong.</div>
        @endforelse
    </div>
</div>
@endsection