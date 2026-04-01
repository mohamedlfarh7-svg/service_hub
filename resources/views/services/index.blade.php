@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <div class="text-center mt-20 mb-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-2 italic">Our Services</h1>
        <p class="text-gray-500 text-sm italic">Browse our wide range of professional services</p>
    </div>

    <div class="max-w-[850px] mx-auto px-6 mb-8 relative">
        <svg class="absolute left-10 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" placeholder="Search services..." 
               class="w-100 px-12 py-3.5 w-full border border-gray-200 rounded-xl outline-none focus:border-blue-400 transition text-sm">
    </div>

    <div class="flex flex-wrap justify-center gap-3 mb-16">
        <button class="px-6 py-2 rounded-lg text-[13px] font-bold bg-blue-600 text-white shadow-md shadow-blue-100">All Services</button>
        <button class="px-6 py-2 rounded-lg text-[13px] font-bold border border-gray-100 text-gray-500 hover:bg-gray-50 transition">Consulting</button>
        <button class="px-6 py-2 rounded-lg text-[13px] font-bold border border-gray-100 text-gray-500 hover:bg-gray-50 transition">Support</button>
        <button class="px-6 py-2 rounded-lg text-[13px] font-bold border border-gray-100 text-gray-500 hover:bg-gray-50 transition">Design</button>
        <button class="px-6 py-2 rounded-lg text-[13px] font-bold border border-gray-100 text-gray-500 hover:bg-gray-50 transition">Marketing</button>
    </div>

    <div class="max-w-7xl mx-auto px-10 md:px-20 grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        @forelse($services as $service)
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="relative">
                    <img src="{{ $service->image ?? 'https://via.placeholder.com/400x200' }}" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full shadow-sm">
                        <span class="text-blue-600 font-bold text-xs">${{ number_format($service->price, 2) }}</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 text-[15px] mb-2 italic">{{ $service->title }}</h3>
                    <p class="text-gray-400 text-[11px] mb-6 leading-relaxed italic">{{ Str::limit($service->description, 85) }}</p>
                    
                    <div class="flex justify-between items-center border-t border-gray-50 pt-4">
                        <span class="text-[10px] text-gray-300 font-bold uppercase tracking-tighter italic">Professional</span>
                        <a href="{{ route('services.show', $service->id) }}" 
                           class="text-[10px] font-bold text-blue-500 uppercase hover:text-blue-700 transition">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-20">
                <div class="text-gray-300 mb-4">
                    <svg class="w-16 h-16 mx-auto opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
                <p class="text-gray-400 italic">No services found in our database at the moment.</p>
            </div>
        @endforelse
    </div>
@endsection