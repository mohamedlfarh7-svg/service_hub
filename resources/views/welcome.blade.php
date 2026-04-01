@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <header class="hero-bg py-32 text-center text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white"></path>
            </svg>
        </div>

        <div class="relative z-10">
            <h1 class="text-5xl font-bold mb-4 tracking-tight italic">Welcome to ServiceHub</h1>
            <p class="text-blue-100 mb-10 text-lg opacity-90 font-light italic max-w-2xl mx-auto px-6">
                Experience excellence with our curated professional services. Seamless booking, trusted experts.
            </p>

            <div class="flex justify-center gap-5">
                <a href="{{ url('/services') }}"
                   class="bg-white text-blue-700 px-10 py-3 rounded-lg font-bold text-xs shadow-xl hover:bg-gray-100 transition-all hover:-translate-y-1">
                    Browse Services
                </a>

                <a href="{{ route('register') }}"
                   class="border-2 border-white/30 backdrop-blur-sm px-10 py-3 rounded-lg font-bold text-xs text-white hover:bg-white/10 transition-all">
                    Get Started
                </a>
            </div>
        </div>
    </header>

    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-10">
            <div class="flex items-center justify-between mb-16">
                <h2 class="text-3xl font-bold text-gray-800 italic relative inline-block">
                    Our Featured Services
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-blue-500"></span>
                </h2>
                <a href="{{ url('/services') }}" class="text-blue-600 font-bold text-xs uppercase tracking-widest hover:underline">View All →</a>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="group bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 italic">Home Cleaning</h3>
                    <p class="text-gray-500 text-sm leading-relaxed italic">Professional high-end cleaning services tailored for your living space.</p>
                </div>

                <div class="group bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a2 2 0 00-1.96 1.414l-.727 2.903a2 2 0 01-2.433 1.433l-4.577-1.144a2 2 0 01-1.433-2.433l.727-2.903a2 2 0 00-1.414-1.96l-2.387-.477a2 2 0 00-1.569.313"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 italic">Plumbing</h3>
                    <p class="text-gray-500 text-sm leading-relaxed italic">Expert solutions for complex piping and emergency repairs 24/7.</p>
                </div>

                <div class="group bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 italic">Electrician</h3>
                    <p class="text-gray-500 text-sm leading-relaxed italic">Certified specialists for safe and efficient electrical infrastructure.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-10">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-16 italic">What Our Elite Clients Say</h2>
            
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 relative">
                    <span class="absolute top-[-20px] left-10 text-6xl text-blue-100">“</span>
                    <p class="text-gray-600 text-sm mb-6 italic leading-loose relative z-10">
                        "The quality of service is unmatched. I booked a cleaning session and the attention to detail was absolutely professional."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-600 rounded-full"></div>
                        <h4 class="font-bold text-xs uppercase tracking-widest text-gray-400">Ahmed R.</h4>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 relative">
                    <span class="absolute top-[-20px] left-10 text-6xl text-blue-100">“</span>
                    <p class="text-gray-600 text-sm mb-6 italic leading-loose relative z-10">
                        "Finally, a platform that values my time. Found a verified plumber within minutes. Outstanding experience!"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-cyan-400 rounded-full"></div>
                        <h4 class="font-bold text-xs uppercase tracking-widest text-gray-400">Sara M.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-blue-700 text-center text-white relative overflow-hidden">
        <div class="relative z-10 max-w-3xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6 italic">Elevate Your Lifestyle Today</h2>
            <p class="text-sm mb-10 opacity-80 font-light">Join our community and experience the future of professional services booking.</p>
            <a href="{{ route('register') }}"
               class="bg-white text-blue-700 px-12 py-4 rounded-xl font-bold text-xs uppercase tracking-widest shadow-2xl hover:bg-gray-50 transition-all hover:scale-105">
                Create Free Account
            </a>
        </div>
    </section>

@endsection