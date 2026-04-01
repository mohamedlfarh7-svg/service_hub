@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <header class="hero-bg py-20 text-center text-white">
        <h1 class="text-4xl font-bold mb-3 tracking-tight italic">Welcome Back, {{ Auth::user()->name }}!</h1>
        <p class="text-blue-100 mb-8 text-sm opacity-90 font-light italic">Manage your bookings and explore new services</p>
        <div class="flex justify-center gap-4">
            <a href="{{ url('/services') }}" class="bg-white text-blue-700 px-8 py-2.5 rounded font-bold text-[11px] shadow-lg hover:bg-gray-100 transition">
                Browse Services
            </a>
            <a href="{{ url('/bookings') }}" class="border border-blue-400 px-8 py-2.5 rounded font-bold text-[11px] hover:bg-white/10 transition">
                View My Bookings
            </a>
        </div>
    </header>

    <section class="py-16 bg-white">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-12 italic">Your Activity Summary</h2>
        <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 px-6">
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">08</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Completed</span>
            </div>
            
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">{{ $activeBookingsCount ?? 0 }}</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Active Now</span>
            </div>

            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">Gold</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Membership</span>
            </div>

            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">${{ number_format($totalSpent ?? 0, 2) }}</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Total Spent</span>
            </div>
        </div>
    </section>

    <section class="py-12 px-8 md:px-16 bg-white border-t border-gray-50">
        <h2 class="text-2xl font-bold text-center italic text-gray-800 mb-12">Recommended for You</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            @forelse($recentBookings ?? [] as $booking)
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden hover:-translate-y-1 transition duration-300">
                <img src="{{ $booking->service->image ?? 'https://via.placeholder.com/400x250' }}" class="h-44 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 mb-1 text-sm italic">{{ $booking->service->title }}</h3>
                    <p class="text-[10px] text-gray-400 mb-6 italic">{{ Str::limit($booking->service->description, 60) }}</p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-blue-600 font-bold text-base">${{ number_format($booking->service->price, 2) }}</span>
                        <a href="{{ route('services.show', $booking->service_id) }}" class="text-[10px] font-bold text-blue-500 uppercase tracking-tighter hover:underline">Book Again</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-10 text-gray-400 italic">
                You haven't booked any services yet. <a href="{{ url('/services') }}" class="text-blue-500 underline">Explore now!</a>
            </div>
            @endforelse

        </div>
    </section>
@endsection