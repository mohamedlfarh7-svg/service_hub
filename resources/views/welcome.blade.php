@extends('layouts.app')

@section('title', 'Welcome to ServiceHub')

@section('content')

    {{-- Hero Section --}}
    <header class="bg-[#2140B1] py-32 text-center text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter uppercase italic">
                Welcome to ServiceHub
            </h1>
            <p class="text-blue-100 mb-10 text-lg opacity-90 max-w-2xl mx-auto font-medium leading-relaxed uppercase tracking-[2px] text-[12px]">
                Book professional services with ease and confidence
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-5">
                <a href="{{ route('services.index') }}"
                   class="bg-white text-[#2140B1] px-10 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl hover:scale-105 transition-all">
                    Browse Services
                </a>

                <a href="{{ route('register') }}"
                   class="border-2 border-white/20 bg-white/5 backdrop-blur-md px-10 py-4 rounded-2xl font-black text-[11px] text-white uppercase tracking-widest hover:bg-white hover:text-[#2140B1] transition-all">
                    Get Started
                </a>
            </div>
        </div>
    </header>

    {{-- Why Choose Us Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl font-black text-gray-900 uppercase italic tracking-tighter mb-2">Why Choose Us</h2>
                <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                @php
                    $features = [
                        ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Quality Service'],
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Expert Team'],
                        ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.175 0l-3.976 2.888c-.783.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'title' => 'Top Rated'],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Fast Service']
                    ];
                @endphp

                @foreach($features as $feature)
                <div class="group cursor-default">
                    <div class="mb-5 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $feature['icon'] }}"></path>
                        </svg>
                    </div>
                    <h4 class="font-black text-[11px] text-gray-900 uppercase tracking-widest italic">{{ $feature['title'] }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured Services Section --}}
    <section class="py-24 bg-[#fcfcfd]">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-gray-900 uppercase italic tracking-tighter mb-2">Featured Services</h2>
                <p class="text-blue-600 text-[10px] font-black uppercase tracking-[3px]">Handpicked Premium Offers</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10 mb-16 text-left">
                @forelse($featuredServices as $service)
                    <div class="bg-white border border-gray-100 rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group">
                        <div class="h-52 overflow-hidden relative">
                            @if($service->image)
                                <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/services/' . $service->image) }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest text-blue-600 shadow-sm">
                                {{ $service->category->name ?? 'Premium' }}
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="font-black text-gray-900 mb-2 text-lg uppercase italic tracking-tight group-hover:text-blue-600 transition-colors">{{ $service->title }}</h3>
                            <p class="text-gray-400 text-[11px] mb-8 leading-relaxed italic font-medium">{{ Str::limit($service->description, 85) }}</p>
                            
                            <div class="flex justify-between items-center pt-6 border-t border-gray-50 text-[12px] font-black italic">
                                <span class="text-gray-900 text-lg tracking-tighter">${{ number_format($service->price, 0) }}</span>
                                
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 bg-gray-50 rounded-[40px] border border-dashed border-gray-200">
                        <p class="text-gray-400 font-black uppercase tracking-[3px] text-xs">No featured services available.</p>
                    </div>
                @endforelse
            </div>

            <div class="flex justify-center">
                <a href="{{ route('services.index') }}" 
                   class="group bg-gray-900 text-white px-10 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl hover:bg-blue-600 transition-all flex items-center gap-3">
                    View All Collection <span class="text-lg transition-transform group-hover:translate-x-2">→</span>
                </a>
            </div>
        </div>
    </section>

@endsection