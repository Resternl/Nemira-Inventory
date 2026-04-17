@foreach($logs as $log)
    <div class="border-l-4 border-[#003CBB] p-4 bg-gray-50 mb-2">
        <p class="text-sm">
            <span class="font-bold text-[#003CBB]">{{ $log->username }}</span> 
            berhasil {{ $log->action }} barang 
            <span class="font-bold">"{{ $log->item_name }}"</span>
        </p>
        <small class="text-gray-400">{{ $log->created_at->diffForHumans() }}</small>
    </div>
@endforeach