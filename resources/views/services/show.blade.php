@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-8 py-12">
    <a href="{{ route('services.index') }}" class="flex items-center text-blue-500 text-sm font-medium mb-8 hover:underline">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Services
    </a>

    <div class="grid md:grid-cols-2 gap-12 items-start mb-16">
        @if($service->image)
                        <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/services/' . $service->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <img src="https://via.placeholder.com/600x400?text={{ urlencode($service->title) }}" 
                             class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 transition-all duration-700">
                    @endif

        <div class="space-y-6">
            <span class="bg-blue-50 text-blue-400 px-4 py-1 rounded-full text-xs font-semibold uppercase tracking-wide">
                {{ $service->category->name ?? 'General' }}
            </span>
            
            <h1 class="text-4xl font-semibold text-gray-800">{{ $service->title }}</h1>

            <div class="space-y-3">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-2 10a3 3 0 11-6 0 3 3 0 016 0zM2 5a2 2 0 012-2h16a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path></svg>
                    <span>Price: <span class="text-blue-600 font-bold ml-2">${{ number_format($service->price, 0) }}</span></span>
                </div>
                
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span>Reward Points: <span class="ml-2 font-bold text-orange-500">{{ $service->price_in_points }} PTS</span></span>
                </div>

                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Duration: <span class="ml-2">{{ $service->duration ?? '60' }} minutes</span></span>
                </div>
            </div>

            <div class="pt-4">
                <h4 class="text-sm font-bold text-gray-800 mb-2">Description</h4>
                <p class="text-gray-500 text-sm leading-relaxed italic">
                    {{ $service->description }}
                </p>
            </div>

            <div class="pt-6">
                @auth
                    @if(auth()->user()->role !== 'admin')
                        <a href="{{ route('bookings.create', ['service_id' => $service->id]) }}" 
                           class="inline-block px-10 py-4 bg-blue-600 text-white rounded-xl font-black uppercase italic tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-100">
                            Book Now
                        </a>
                    @else
                        <div class="px-6 py-4 bg-gray-50 border border-dashed border-gray-200 text-gray-400 rounded-xl font-black uppercase italic text-center cursor-not-allowed tracking-widest">
                            Admin View Only
                        </div>
                    @endif
                @else
                    <div class="pt-4">
                        <a href="{{ route('login') }}" class="w-full bg-gray-800 text-white py-4 rounded-xl font-black uppercase italic tracking-widest flex items-center justify-center hover:bg-black transition-all">
                            Login to Book
                        </a>
                        <p class="text-center text-gray-400 text-[10px] mt-4 italic uppercase tracking-[3px] font-bold">Authentication required</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-lg font-bold text-gray-700 mb-6 italic uppercase tracking-tighter">What's Included</h3>
            <ul class="space-y-3 text-sm text-gray-500">
                <li class="flex items-center"><span class="text-blue-400 mr-2 font-bold">✓</span> Professional consultation</li>
                <li class="flex items-center"><span class="text-blue-400 mr-2 font-bold">✓</span> Detailed analysis</li>
                <li class="flex items-center"><span class="text-blue-400 mr-2 font-bold">✓</span> Follow-up support</li>
            </ul>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-lg font-bold text-gray-700 mb-6 italic uppercase tracking-tighter">Requirements</h3>
            <ul class="space-y-3 text-sm text-gray-500">
                <li class="flex items-center"><span class="text-gray-400 mr-3 font-bold">•</span> Booking confirmation</li>
                <li class="flex items-center"><span class="text-gray-400 mr-3 font-bold">•</span> Identity verification</li>
                <li class="flex items-center"><span class="text-gray-400 mr-3 font-bold">•</span> Payment confirmation</li>
            </ul>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-lg font-bold text-gray-700 mb-6 italic uppercase tracking-tighter">Cancellation</h3>
            <p class="text-sm text-gray-500 leading-relaxed italic">
                Free cancellation up to 24 hours before the appointment starts.
            </p>
        </div>
    </div>
</div>
@endsection