@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-8 py-20">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        <div class="rounded-[30px] overflow-hidden shadow-2xl border border-gray-100">
            <img src="{{ $service->image }}" class="w-full h-[450px] object-cover">
        </div>

        <div>
            <span class="text-blue-600 font-bold text-xs uppercase tracking-widest italic">Professional Service</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-4 mb-6 italic">{{ $service->title }}</h1>
            <p class="text-gray-500 leading-loose mb-8 italic">{{ $service->description }}</p>
            
            <div class="flex items-center gap-10 mb-10 border-y border-gray-50 py-6">
                <div>
                    <p class="text-gray-400 text-[10px] uppercase font-bold tracking-tighter">Price</p>
                    <p class="text-2xl font-black text-blue-600 italic">${{ number_format($service->price, 2) }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-[10px] uppercase font-bold tracking-tighter">Duration</p>
                    <p class="text-lg font-bold text-gray-700 italic">60 min</p>
                </div>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <div class="mb-6">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Select Date</label>
                    <input type="date" name="booking_date" required 
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-blue-400 transition italic">
                </div>
                <button type="submit" class="w-full bg-[#0014FF] text-white py-4 rounded-xl font-bold text-sm shadow-xl shadow-blue-100 hover:scale-[1.02] transition-all uppercase tracking-widest">
                    Book This Service Now
                </button>
            </form>
        </div>
    </div>
</div>
@endsection