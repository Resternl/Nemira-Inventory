@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-4xl font-bold text-black">Detail Product</h2>
        <a href="{{ route('inventory.index') }}" class="bg-[#003CBB] text-white px-4 py-2 rounded-xl font-bold shadow-md">
            ← Back to List
        </a>
    </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <div class="flex-1 space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">nama produk</label>
                    <input type="text" 
                        value="{{ $item->nama_item ?? '' }}" 
                        class="w-full p-3 border border-gray-200 bg-gray-50 rounded-xl outline-none shadow-sm cursor-default" 
                        readonly>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Kode barang</label>
                    <input type="text" 
                        value="{{ $item->kode_item ?? '' }}" 
                        class="w-full p-3 border border-gray-200 bg-gray-50 rounded-xl outline-none shadow-sm cursor-default" 
                        readonly>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">jenis barang</label>
                        <input type="text" 
                            value="{{ $item->jenis_item ?? '' }}" 
                            class="w-full p-3 border border-gray-200 bg-gray-50 rounded-xl outline-none shadow-sm cursor-default" 
                            readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Jumlah</label>
                        <input type="number" 
                            value="{{ $item->jumlah_item ?? '' }}" 
                            class="w-full p-3 border border-gray-200 bg-gray-50 rounded-xl outline-none shadow-sm cursor-default" 
                            readonly>
                    </div>
                </div>
            </div>

            <div class="flex-[1.2] flex flex-col">
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Deskripsi</label>
                <textarea class="w-full p-4 border border-gray-200 bg-gray-50 rounded-xl outline-none flex-grow min-h-[300px] shadow-sm cursor-default text-gray-600" 
                        readonly>{{ $item->deskripsi ?? '' }}</textarea>
            </div>
        </div>
    </div>
@endsection