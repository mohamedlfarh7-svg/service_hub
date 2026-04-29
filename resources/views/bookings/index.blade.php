@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-20 bg-white text-gray-900">
    <h1 class="text-[26px] font-bold text-gray-900 mb-10 italic tracking-tighter uppercase">My Bookings</h1>

    <div class="flex items-center gap-3 mb-14 overflow-x-auto pb-4">
        <a href="{{ route('bookings.index') }}" 
           class="px-7 py-2 {{ !request('status') ? 'bg-[#0047FF] text-white' : 'border border-gray-200 text-gray-400' }} rounded-lg text-[13px] font-medium shadow-md transition-all">
            All Bookings
        </a>
        @foreach(['pending', 'accepted', 'cancelled'] as $status)
            <a href="{{ route('bookings.index', ['status' => $status]) }}" 
               class="px-7 py-2 {{ request('status') == $status ? 'bg-[#0047FF] text-white' : 'border border-gray-200 text-gray-400 hover:bg-gray-50' }} rounded-lg text-[13px] font-medium italic tracking-wide transition-all uppercase">
                {{ $status }}
            </a>
        @endforeach
    </div>

    @if($bookings->count() > 0)
        <div class="grid grid-cols-1 gap-6">
            @foreach($bookings as $booking)
                <div class="bg-white border border-gray-100 rounded-[25px] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex items-center justify-between group hover:border-blue-100 transition-all">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#0047FF]">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-800 italic uppercase tracking-tight">{{ $booking->service->title }}</h3>
                            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest font-bold">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M, Y') }} • {{ $booking->booking_time ?? '10:00' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-8">
                        @if($booking->status == 'accepted' || $booking->status == 'completed')
                        
                        @endif

                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest italic
                            @if($booking->status == 'accepted') bg-blue-50 text-blue-600 
                            @elseif($booking->status == 'completed') bg-green-50 text-green-600 
                            @elseif($booking->status == 'cancelled') bg-red-50 text-red-600 
                            @else bg-orange-50 text-orange-600 @endif">
                            {{ $booking->status }}
                        </span>
                        
                        <div class="text-right">
                            <span class="block text-lg font-black text-gray-900 italic leading-none">${{ $booking->service->price }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $bookings->links() }}
        </div>
    @else
        <div class="w-full bg-white border border-gray-200 rounded-[30px] py-32 flex flex-col items-center justify-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] border-b-[3px]">
            <div class="mb-6 text-gray-200">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" stroke-width="0.5" viewBox="0 0 24 24">
                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-gray-400 text-sm font-bold italic mb-8 uppercase tracking-[3px]">No {{ request('status') }} bookings found</p>
            <a href="{{ route('services.index') }}" 
               class="px-10 py-4 bg-[#0047FF] text-white rounded-xl text-[12px] font-black uppercase tracking-[2px] italic hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                Explore Services
            </a>
        </div>
    @endif
</div>

<div id="disputeModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-white/60 backdrop-blur-sm"></div>
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-[30px] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-gray-100">
            <h2 class="text-[22px] font-black italic uppercase tracking-tighter text-gray-900 mb-2">Open <span class="text-[#0047FF]">Dispute</span></h2>
            <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-8">Explain the issue with your booking</p>
            
            <form action="{{ route('disputes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="booking_id" id="modal_booking_id">
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 italic">Reason for dispute</label>
                        <textarea name="reason" rows="4" required
                            class="w-full bg-white border border-gray-200 rounded-2xl p-4 text-sm focus:outline-none focus:border-[#0047FF] transition-all placeholder:text-gray-200"
                            placeholder="Type details here..."></textarea>
                    </div>
                </div>

                <div class="flex gap-4 mt-8">
                    <button type="button" onclick="closeDisputeModal()" 
                        class="flex-1 py-4 text-[11px] font-black uppercase italic text-gray-400 hover:text-gray-600 transition-all">
                        Cancel
                    </button>
                    <button type="submit" 
                        class="flex-1 py-4 text-[11px] font-black uppercase italic text-white bg-[#0047FF] rounded-xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">
                        Submit Claim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openDisputeModal(id) {
        document.getElementById('modal_booking_id').value = id;
        document.getElementById('disputeModal').classList.remove('hidden');
    }
    function closeDisputeModal() {
        document.getElementById('disputeModal').classList.add('hidden');
    }
</script>
@endsection