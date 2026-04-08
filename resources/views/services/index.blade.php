@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-12 bg-white">

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h1 class="text-4xl font-black text-gray-900 mb-2 italic tracking-tighter uppercase">Our Services</h1>
            <p class="text-blue-600 text-[10px] font-black uppercase tracking-[4px]">Professional Excellence Center</p>
        </div>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('services.create') }}" 
               class="inline-flex items-center px-10 py-4 bg-gray-900 text-white rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-blue-100 group">
                <svg class="w-4 h-4 mr-2 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Service
            </a>
        @endif
    </div>

    <div class="w-full mb-10">
        <form action="{{ route('services.index') }}" method="GET" class="relative group">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-300 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search our premium services..." 
                   class="w-full pl-14 pr-6 py-5 border border-gray-100 rounded-[24px] outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-500/5 transition-all shadow-sm text-sm placeholder-gray-300">
        </form>
    </div>

    <div class="flex flex-wrap justify-start gap-4 mb-14">
        <a href="{{ route('services.index') }}" 
           class="px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request('category') ? 'bg-[#0061FF] text-white shadow-lg shadow-blue-100' : 'bg-white border border-gray-100 text-gray-400 hover:border-blue-200' }}">
            All Services
        </a>
        
        @foreach(['Consulting', 'Support', 'Design', 'Marketing'] as $cat)
            <a href="{{ route('services.index', ['category' => strtolower($cat)]) }}" 
               class="px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('category') == strtolower($cat) ? 'bg-[#0061FF] text-white shadow-lg shadow-blue-100' : 'bg-white border border-gray-100 text-gray-400 hover:border-blue-200' }}">
               {{ $cat }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($services as $service)
            <div class="group block bg-white border border-gray-50 rounded-[40px] overflow-hidden shadow-[0_15px_50px_rgba(0,0,0,0.03)] hover:shadow-2xl transition-all duration-500 relative">
                {{-- Image Container --}}
                <div class="h-64 overflow-hidden relative bg-gray-50">
                    @if($service->image)
                        <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/services/' . $service->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <img src="https://via.placeholder.com/600x400?text={{ urlencode($service->title) }}" 
                             class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 transition-all duration-700">
                    @endif

                    <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-[2px] text-blue-600 shadow-sm border border-white/50">
                        {{ $service->category->name ?? 'Premium' }}
                    </div>
                </div>

                <div class="p-10">
                    <h3 class="font-black text-gray-900 text-xl mb-4 group-hover:text-blue-600 transition-colors uppercase italic tracking-tighter leading-tight">
                        {{ $service->title }}
                    </h3>
                    <p class="text-gray-400 text-[11px] leading-relaxed mb-10 italic font-medium">
                        {{ Str::limit($service->description, 100) }}
                    </p>
                    
                    <div class="flex justify-between items-center pt-8 border-t border-gray-50">
                        <div>
                            <span class="block text-[9px] text-gray-300 font-black uppercase tracking-widest leading-none mb-2">Investment</span>
                            <span class="text-2xl font-black text-gray-900 italic leading-none tracking-tighter">${{ number_format($service->price, 0) }}</span>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="block text-[9px] text-gray-300 font-black uppercase tracking-widest leading-none mb-2">Duration</span>
                            <span class="text-xs font-black text-blue-600 uppercase tracking-tighter bg-blue-50 px-3 py-1 rounded-lg">{{ $service->duration ?? '60' }} MINS</span>
                        </div>
                    </div>

                    <a href="{{ route('services.show', $service->id) }}" class="mt-8 w-full inline-flex items-center justify-center py-4 bg-gray-50 group-hover:bg-blue-600 group-hover:text-white rounded-2xl text-[10px] font-black uppercase tracking-[3px] transition-all duration-300">
                        View Service Detail
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-40 bg-gray-50 rounded-[60px] border-2 border-dashed border-gray-200">
                <div class="mb-6 inline-flex p-6 bg-white rounded-full shadow-sm">
                    <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <p class="text-gray-400 font-black uppercase tracking-[5px] text-xs">Collection is empty</p>
                <p class="text-gray-300 text-[10px] uppercase font-bold mt-2 italic">Try refining your search or category filter</p>
            </div>
        @endforelse
    </div>
</div>
@endsection