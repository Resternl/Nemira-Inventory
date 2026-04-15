@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-6 px-4">
    <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-4">
        <h1 class="text-2xl font-bold text-[#111]">Inventory List</h1>
        <a href="{{ route('inventory.create') }}" class="bg-[#003CBB] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#003199] transition font-medium">
            <span class="text-xl">+</span> Add new Product
        </a>
    </div>

    <form action="{{ route('inventory.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 mb-8">
    
    <div class="relative flex-grow">
        <input type="text" name="search" value="{{ request('search') }}" 
            placeholder="Cari nama atau kode barang..." 
            class="w-full pl-12 pr-4 py-2 rounded-2xl  focus:ring-0 focus:border-[#003CBB] outline-none font-bold ">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
    </div>

    <div class="flex flex-wrap gap-3">
        <select name="jenis" onchange="this.form.submit()" 
            class="px-4 py-2 rounded-2xl font-normal bg-white s outline-none cursor-pointer hover:bg-gray-50 min-w-[150px]">
            <option value="">Semua Jenis</option>
            @foreach($categories as $kat)
                <option value="{{ $kat }}" {{ request('jenis') == $kat ? 'selected' : '' }}>
                    {{ ucfirst($kat) }}
                </option>
            @endforeach
        </select>

        <select name="sort" onchange="this.form.submit()" 
            class="px-4 py-2 rounded-2xl font-normal bg-white outline-none cursor-pointer hover:bg-gray-50 min-w-[150px]">
            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
            <option value="stok_sedikit" {{ request('sort') == 'stok_sedikit' ? 'selected' : '' }}>Stok Terendah</option>
            <option value="stok_banyak" {{ request('sort') == 'stok_banyak' ? 'selected' : '' }}>Stok Tertinggi</option>
            <option value="a_z" {{ request('sort') == 'a_z' ? 'selected' : '' }}>Nama (A-Z)</option>
        </select>

        @if(request('search') || request('sort') != 'latest' || request('jenis'))
            <a href="{{ route('inventory.index') }}" 
                class="flex items-center justify-center px-4 bg-[#E50000] text-white rounded-2xl hover:bg-red-600 transition-all active:translate-y-1 active:shadow-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </a>
        @endif
    </div>
</form>

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
                <a href="{{ route('inventory.show', $item->id) }}" 
                class="bg-[#003CBB] text-white text-xs font-bold px-3 py-1.5 rounded-lg border-2 hover:bg-blue-800 transition">
                 Show
                </a>
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