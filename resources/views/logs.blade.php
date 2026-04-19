@extends('layouts.app')

@section('content')
<div class="p-8">
    <h2 class="text-2xl font-bold mb-6">Riwayat Aktifitas</h2>

    <form action="{{ route('inventory.logs') }}" method="GET" class="flex gap-3 mb-8">
    <div class="relative flex-grow">
        <input type="text" name="search" value="{{ request('search') }}" 
            placeholder="Cari nama barang..." 
            class="w-full pl-12 pr-4 py-2 rounded-2xl  focus:ring-0 focus:border-[#003CBB] outline-none font-bold ">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
    </div>

        <select name="user" class="border border-black rounded-xl px-4 focus:outline-none font-medium">
            <option value="">Semua User</option>
            @foreach($users as $u)
                <option value="{{ $u->username }}" {{ request('user') == $u->username ? 'selected' : '' }}>{{ $u->username }}</option>
            @endforeach
        </select>

        <select name="aksi" class="border border-black rounded-xl px-4  focus:outline-none font-medium">
            <option value="">Semua Aktifitas</option>
            <option value="Menambahkan" {{ request('aksi') == 'Menambahkan' ? 'selected' : '' }}>add</option>
            <option value="Mengubah data" {{ request('aksi') == 'Mengubah data' ? 'selected' : '' }}>update</option>
            <option value="Menghapus" {{ request('aksi') == 'Menghapus' ? 'selected' : '' }}>delete</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white border border-black rounded-xl px-6 py-2  font-bold active:shadow-none active:translate-x-[2px] active:translate-y-[2px]">
            Cari
        </button>
        
        <a href="{{ route('inventory.logs') }}" class="bg-red-600 text-white border border-black rounded-xl px-4 py-2  flex items-center justify-center font-bold">
            X
        </a>
    </form>

    <div class="space-y-2">
        <div class="grid grid-cols-[1.4fr_2.2fr_1.2fr_0.6fr_1.2fr] gap-4 px-4 py-2 text-sm font-bold text-gray-600 uppercase tracking-wider">
            <div>Nama User</div>
            <div>Nama Produk</div>
            <div>Waktu</div>
            <div class="text-center">Aksi</div>
        </div>

        @forelse($logs as $log)
        <div class="grid grid-cols-[1.4fr_2.2fr_1.2fr_0.6fr_1.2fr] gap-4 items-center bg-white p-2 rounded-xl border border-gray-200 shadow-sm hover:border-[#003CBB] transition">
            <div class="px-3 py-2 text-sm font-medium border border-gray-100 rounded-lg truncate bg-gray-50">{{ $log->username }}</div>
            <div class="px-3 py-2 text-sm border border-gray-100 rounded-lg truncate text-gray-500">{{ $log->nama_item }}</div>
            <div class="text-xs text-gray-400 font-bold uppercase tracking-tighter">
                {{ $log->created_at->translatedFormat('d M Y, H:i') }}
            </div>
            <div class="flex justify-center">
                @php
                    $color = 'bg-blue-500';
                    if($log->action == 'Menambahkan') $color = 'bg-green-600';
                    if($log->action == 'Menghapus') $color = 'bg-red-600';
                @endphp
                <span class="{{ $color }} text-white text-xs font-black px-6 py-3 rounded-lg uppercase border border-black">
                    {{ $log->action }}
                </span>
            </div>
        </div>
        @empty
        <div class="text-center py-10 border-2 border-dashed border-gray-300 rounded-xl text-gray-400 font-bold">
            Tidak ada riwayat aktivitas yang ditemukan.
        </div>
        @endforelse
    </div>
</div>
@endsection