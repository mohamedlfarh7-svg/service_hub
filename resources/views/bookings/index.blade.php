@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-20 bg-white">
    <h1 class="text-[26px] font-bold text-gray-900 mb-10">My Bookings</h1>

    <div class="flex items-center gap-3 mb-14">
        <button class="px-7 py-2 bg-[#0047FF] text-white rounded-lg text-[13px] font-medium shadow-md">
            All Book
        </button>
        @foreach(['pending', 'confirmed', 'cancelled', 'completed'] as $status)
            <button class="px-7 py-2 border border-gray-200 text-gray-400 rounded-lg text-[13px] font-medium italic">
                {{ $status }}
            </button>
        @endforeach
    </div>

    <div class="w-full bg-white border border-gray-200 rounded-[30px] py-32 flex flex-col items-center justify-center 
                shadow-[0_8px_30px_rgb(0,0,0,0.04)] border-b-[3px]">
        
        <div class="mb-6 text-gray-800">
            <svg class="w-14 h-14" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
        </div>

        <p class="text-gray-600 text-sm font-medium mb-8">No bookings found</p>

        <a href="{{ url('/services') }}" 
           class="px-10 py-3 bg-[#0014FF] text-white rounded-xl text-[13px] font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100">
            Book a Service
        </a>
    </div>
</div>

<style>
    .custom-frame {
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.05);
    }
</style>
@endsection