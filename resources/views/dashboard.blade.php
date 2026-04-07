@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-12 bg-white min-h-screen">
    
    {{-- Header --}}
    <div class="mb-10 ml-2">
        <h1 class="text-[32px] font-black text-gray-900 italic uppercase tracking-tighter">Welcome, {{ auth()->user()->name }}!</h1>
        <p class="text-blue-600 text-[10px] font-black uppercase tracking-[3px] mt-1">Exclusive Dashboard Access</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white border border-gray-100 rounded-[24px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.02)] flex items-center justify-between group hover:border-blue-100 transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                </div>
                <p class="text-[11px] font-black uppercase tracking-widest text-gray-400">Total</p>
            </div>
            <h3 class="text-2xl font-black text-gray-900">{{ $stats['total'] }}</h3>
        </div>

        <div class="bg-white border border-gray-100 rounded-[24px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.02)] flex items-center justify-between group hover:border-orange-100 transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-[11px] font-black uppercase tracking-widest text-gray-400">Pending</p>
            </div>
            <h3 class="text-2xl font-black text-gray-900">{{ $stats['pending'] }}</h3>
        </div>

        <div class="bg-white border border-gray-100 rounded-[24px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.02)] flex items-center justify-between group hover:border-green-100 transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500 group-hover:bg-green-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-[11px] font-black uppercase tracking-widest text-gray-400">Accepted</p>
            </div>
            <h3 class="text-2xl font-black text-gray-900">{{ $stats['confirmed'] }}</h3>
        </div>

        <div class="bg-white border border-gray-100 rounded-[24px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.02)] flex items-center justify-between group hover:border-purple-100 transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-[11px] font-black uppercase tracking-widest text-gray-400">Completed</p>
            </div>
            <h3 class="text-2xl font-black text-gray-900">{{ $stats['completed'] }}</h3>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="mb-12">
        <h2 class="text-[14px] font-black text-gray-900 mb-6 uppercase tracking-[3px] italic">Quick Operations</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('services.index') }}" class="group bg-gray-900 p-8 rounded-[32px] text-white shadow-2xl shadow-gray-200 hover:bg-blue-600 transition-all relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-2xl border border-white/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <h3 class="text-lg font-black uppercase italic tracking-tight">Book Service</h3>
                    <p class="text-gray-400 group-hover:text-white/80 text-xs mt-1">Schedule a new premium appointment</p>
                </div>
            </a>

            <a href="{{ route('bookings.index') }}" class="bg-white border border-gray-100 p-8 rounded-[32px] shadow-[0_10px_40px_rgba(0,0,0,0.02)] hover:shadow-xl transition-all">
                <div class="w-12 h-12 mb-6 text-gray-900">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <h3 class="text-lg font-black text-gray-900 uppercase italic tracking-tight">My Bookings</h3>
                <p class="text-gray-400 text-xs mt-1">Review and manage appointments</p>
            </a>

            <a href="{{ route('profile.edit') }}" class="bg-white border border-gray-100 p-8 rounded-[32px] shadow-[0_10px_40px_rgba(0,0,0,0.02)] hover:shadow-xl transition-all">
                <div class="w-12 h-12 mb-6 text-gray-900">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-lg font-black text-gray-900 uppercase italic tracking-tight">Account</h3>
                <p class="text-gray-400 text-xs mt-1">Personal information & security</p>
            </a>
        </div>
    </div>

    {{-- Recent Bookings Table --}}
    <div class="bg-white border border-gray-50 rounded-[35px] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="px-10 py-8 border-b border-gray-50 flex justify-between items-center">
            <h2 class="text-[14px] font-black text-gray-900 uppercase tracking-[3px] italic">Recent Activity</h2>
            <a href="{{ route('bookings.index') }}" class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">View All History</a>
        </div>
        
        <div class="p-4">
            @if(count($recentBookings) > 0)
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-300 uppercase tracking-widest">
                            <th class="px-6 py-3">Service</th>
                            <th class="px-6 py-3">Date & Time</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentBookings as $booking)
                            <tr class="group hover:bg-gray-50 transition-colors rounded-2xl">
                                <td class="px-6 py-4 bg-white border-y border-l border-gray-50 group-hover:border-gray-100 rounded-l-2xl">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center text-white text-[10px] font-bold uppercase italic">
                                            {{ substr($booking->service->title, 0, 2) }}
                                        </div>
                                        <span class="font-black text-gray-900 text-sm italic tracking-tight">{{ $booking->service->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-gray-50 group-hover:border-gray-100 text-xs font-bold text-gray-500 italic">
                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }} at {{ $booking->booking_time }}
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-gray-50 group-hover:border-gray-100">
                                    @php
                                        $statusConfig = [
                                            'pending'   => ['label' => 'Pending', 'class' => 'bg-orange-50 text-orange-500'],
                                            'confirmed' => ['label' => 'Accepted', 'class' => 'bg-green-50 text-green-500'],
                                            'completed' => ['label' => 'Completed', 'class' => 'bg-purple-50 text-purple-500'],
                                            'cancelled' => ['label' => 'Cancelled', 'class' => 'bg-red-50 text-red-500']
                                        ];
                                        $currentStatus = $statusConfig[$booking->status] ?? ['label' => $booking->status, 'class' => 'bg-gray-50 text-gray-400'];
                                    @endphp
                                    <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest {{ $currentStatus['class'] }}">
                                        {{ $currentStatus['label'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-r border-gray-50 group-hover:border-gray-100 rounded-r-2xl text-right">
                                    <span class="font-black text-gray-900 text-sm italic">${{ number_format($booking->service->price, 0) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="py-20 text-center">
                    <div class="mb-4 text-gray-100">
                        <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <p class="text-gray-400 font-black uppercase tracking-[4px] text-xs italic">No activity recorded</p>
                    <a href="{{ route('services.index') }}" class="inline-block mt-6 px-8 py-3 bg-blue-600 text-white rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-blue-700 transition-all">Secure your first service</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection