@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8 bg-[#f8fafc] min-h-screen">
 
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-500 text-sm">Manage your bookings and profile</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
        <div class="bg-white border-2 border-blue-500 rounded-xl p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="text-blue-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                </div>
                <p class="text-sm font-medium text-gray-500">Total</p>
            </div>
            <h3 class="text-xl font-bold text-blue-600">{{ $stats['total'] }}</h3>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="text-orange-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm font-medium text-gray-500">Pending</p>
            </div>
            <h3 class="text-xl font-bold text-orange-400">{{ $stats['pending'] }}</h3>
        </div>

        {{-- التعديل هنا: بدلنا Confirmed بـ Accepted --}}
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="text-green-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm font-medium text-gray-500">Accepted</p>
            </div>
            <h3 class="text-xl font-bold text-green-500">{{ $stats['accepted'] }}</h3>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="text-purple-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-sm font-medium text-gray-500">cancelled</p>
            </div>
            <h3 class="text-xl font-bold text-purple-500">{{ $stats['cancelled'] }}</h3>
        </div>
    </div>

    <div class="mb-10">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('services.index') }}" class="bg-blue-600 p-8 rounded-2xl text-white shadow-lg hover:bg-blue-700 transition-all">
                <div class="mb-4">
                    <svg class="w-10 h-10 border-2 border-white/30 rounded-full p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <h3 class="text-xl font-semibold">Book Service</h3>
                <p class="text-blue-100 text-sm mt-1">Schedule a new service</p>
            </a>

            <a href="{{ route('bookings.index') }}" class="bg-white border border-gray-100 p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                <div class="mb-4 text-gray-700">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">My Bookings</h3>
                <p class="text-gray-500 text-sm mt-1">View your appointments</p>
            </a>

            <a href="{{ route('profile.edit') }}" class="bg-white border border-gray-100 p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                <div class="mb-4 text-gray-700">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Profile Settings</h3>
                <p class="text-gray-500 text-sm mt-1">Update your information</p>
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden min-h-[300px] flex flex-col">
        <div class="px-8 py-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-800">Recent Bookings</h2>
        </div>
        
        <div class="flex-grow flex flex-col items-center justify-center p-12">
            @if(count($recentBookings) > 0)
    
            @else
                <div class="text-center">
                    <div class="mb-4 text-gray-400 flex justify-center">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <p class="text-gray-500 font-medium">No bookings yet</p>
                    <a href="{{ route('services.index') }}" class="text-blue-500 text-sm hover:underline mt-1 inline-block">Book your first service</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection