@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-16 bg-white">
    <div class="text-center mb-20">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">About Us</h1>
        <p class="text-gray-500 max-w-3xl mx-auto text-sm leading-relaxed">
            We connect professionals with clients for seamless service booking.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Our Mission</h2>
            <p class="text-gray-500 text-sm leading-relaxed">
                To provide a reliable platform that makes professional services accessible to everyone. Our goal is to simplify the booking process and ensure quality service delivery.
            </p>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Our Vision</h2>
            <p class="text-gray-500 text-sm leading-relaxed">
                To become the leading service booking platform, trusted by millions of users worldwide for their professional service needs.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-24">
        @php
            $stats = [
                ['label' => 'Mission Driven', 'value' => '100%', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'], // Target/Flash icon
                ['label' => 'Happy Clients', 'value' => '5000+', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'], // Smile icon
                ['label' => 'Awards Won', 'value' => '25', 'icon' => 'M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2z'], // Trophy/Award icon
                ['label' => 'Growth Rate', 'value' => '300%', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'] // Chart icon
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-white p-8 rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 text-center hover:translate-y-[-5px] transition-transform">
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-500 mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $stat['value'] }}</h3>
            <p class="text-xs text-gray-400 font-medium">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="bg-[#F0F7FF] rounded-[30px] p-12 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-12">Our Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h4 class="font-bold text-gray-800 mb-2">Quality</h4>
                <p class="text-xs text-gray-500">We never compromise on quality</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h4 class="font-bold text-gray-800 mb-2">Transparency</h4>
                <p class="text-xs text-gray-500">Clear and honest communication</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h4 class="font-bold text-gray-800 mb-2">Innovation</h4>
                <p class="text-xs text-gray-500">Always improving our platform</p>
            </div>
        </div>
    </div>
</div>
@endsection