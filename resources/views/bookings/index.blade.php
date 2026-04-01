@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16 min-h-[700px]">
    <h1 class="text-2xl font-bold text-gray-800 mb-8 italic">My Bookings</h1>

    <div class="flex flex-wrap gap-3 mb-12">
        <a href="{{ route('bookings.index') }}" 
           class="px-6 py-2 {{ !request('status') ? 'bg-blue-600 text-white' : 'border border-gray-200 text-gray-400' }} rounded-lg text-xs font-medium transition shadow-sm">
            All Book
        </a>
        @foreach(['pending', 'confirmed', 'cancelled', 'completed'] as $status)
            <a href="{{ route('bookings.index', ['status' => $status]) }}" 
               class="px-6 py-2 {{ request('status') == $status ? 'bg-blue-600 text-white' : 'border border-gray-200 text-gray-400' }} rounded-lg text-xs font-medium italic transition hover:bg-gray-50">
                {{ $status }}
            </a>
        @endforeach
    </div>

    @if($bookings->count() > 0)
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-widest text-gray-400 italic">Service</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-widest text-gray-400 italic">Date</th>
                        <th class="px-8 py-5 text-[10px] font-bold uppercase tracking-widest text-gray-400 italic text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($bookings as $booking)
                    <tr class="hover:bg-gray-50/30 transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="{{ $booking->service->image }}" class="w-10 h-10 rounded-lg object-cover">
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">{{ $booking->service->title }}</h3>
                                    <span class="text-[10px] text-blue-600 font-bold">${{ number_format($booking->service->price, 2) }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-xs text-gray-500 italic">
                            {{ $booking->booking_date->format('d M, Y') }}
                        </td>
                        <td class="px-8 py-6 text-right">
                            <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase border 
                                {{ $booking->status == 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100' : '' }}
                                {{ $booking->status == 'confirmed' ? 'bg-blue-50 text-blue-600 border-blue-100' : '' }}
                                {{ $booking->status == 'completed' ? 'bg-green-50 text-green-600 border-green-100' : '' }}
                                {{ $booking->status == 'cancelled' ? 'bg-red-50 text-red-600 border-red-100' : '' }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-8">
            {{ $bookings->links() }}
        </div>

    @else
        <div class="w-full border border-gray-100 rounded-3xl py-32 flex flex-col items-center justify-center shadow-sm bg-white">
            <div class="mb-6 text-gray-800">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-gray-600 text-sm font-medium mb-8">No bookings found</p>
            <a href="{{ url('/services') }}" class="px-10 py-3 bg-blue-600 text-white rounded-lg text-xs font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200 uppercase tracking-wider">
                Book a Service
            </a>
        </div>
    @endif
</div>
@endsection