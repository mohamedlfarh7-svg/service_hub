@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 bg-[#F8FAFC] min-h-screen">
    <div class="mb-10 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight lowercase">Manage Bookings</h1>
            <p class="text-gray-500 italic text-sm mt-1">Viewing requests for your services only.</p>
        </div>
        <div class="bg-blue-600 text-white px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest">
            Admin Panel
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm">
            <span class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Total Requests</span>
            <h3 class="text-2xl font-black text-gray-900">{{ $bookings->count() }}</h3>
        </div>
        <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm">
            <span class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Pending</span>
            <h3 class="text-2xl font-black text-blue-600">{{ $bookings->where('status', 'pending')->count() }}</h3>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-[30px] overflow-hidden shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Client</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Service</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Date & Time</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Status</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs uppercase">
                                {{ substr($booking->user->name, 0, 2) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 lowercase">{{ $booking->user->name }}</p>
                                <p class="text-[11px] text-gray-400 italic">{{ $booking->user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-sm font-medium text-gray-700">{{ $booking->service->name }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm text-gray-900 font-mono">{{ $booking->booking_date }}</p>
                        <p class="text-[11px] text-gray-400 uppercase">{{ $booking->booking_time }}</p>
                    </td>
                    <td class="px-8 py-6">
                        @php
                            $statusColors = [
                                'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                'accepted' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                'cancelled' => 'bg-rose-50 text-rose-600 border-rose-100',
                                'completed' => 'bg-blue-50 text-blue-600 border-blue-100',
                            ];
                        @endphp
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-tighter border {{ $statusColors[$booking->status] ?? 'bg-gray-50' }}">
                            {{ $booking->status }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2">
                            @if($booking->status === 'pending')
                                <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="accepted">
                                    <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all" title="Accept">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>

                                <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all" title="Cancel">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            @else
                                <span class="text-[10px] text-gray-300 italic uppercase font-bold tracking-widest">No Actions</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <p class="text-gray-400 italic text-sm">No booking requests found yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection