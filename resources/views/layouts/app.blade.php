<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub - @yield('title', 'Professional Services')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; letter-spacing: -0.01em; }
        .nav-link-active { color: #0061FF; font-weight: 700; }
        .hero-bg { background-color: #2447B3; }
        .footer-bg { background-color: #2D2D3A; }
    </style>
</head>
<body class="bg-white">

    <div class="h-1 bg-[#F1F3F5] border-b border-gray-100"></div>

    <nav class="flex items-center justify-between px-16 py-3.5 bg-white border-b border-gray-50">
        
        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
            <div class="text-[#00D1FF] group-hover:scale-105 transition-transform">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="8" width="18" height="12" rx="2" ry="2"></rect>
                    <path d="M7 8V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"></path>
                </svg>
            </div>
            <span class="text-xl font-semibold text-gray-700 tracking-tight">serviceHub</span>
        </a>
        @auth
            <div class="relative">
                <a href="{{ route('notifications.index') }}" class="text-gray-500 hover:text-[#0066FF] transition-all relative inline-block">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full border-2 border-white">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>
            </div>
        @endauth
                
        <div class="hidden md:flex items-center gap-10 text-[15px]">
            <a href="{{ url('/') }}" 
               class="flex items-center gap-1.5 transition-colors {{ Request::is('/') ? 'nav-link-active' : 'text-gray-500 hover:text-blue-500' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> 
                home
            </a>

            <a href="{{ route('services.index') }}" 
               class="flex items-center gap-1.5 transition-colors {{ Request::is('services*') ? 'nav-link-active' : 'text-gray-500 hover:text-blue-500' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                services
            </a>

            @auth
                @if(Auth::user()->role === 'admin') 
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="flex items-center gap-1.5 transition-colors {{ Request::is('admin*') ? 'text-blue-600 nav-link-active underline decoration-blue-200 decoration-2 underline-offset-4' : 'text-blue-500 hover:text-blue-700 font-bold' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Admin Panel
                    </a>
                @endif
            @endauth

            <a href="{{ route('about') }}" 
               class="flex items-center gap-1.5 transition-colors {{ Request::is('about') ? 'nav-link-active' : 'text-gray-500 hover:text-blue-500' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                About
            </a>

            <a href="{{ route('contact') }}" 
               class="flex items-center gap-1.5 transition-colors {{ Request::is('contact') ? 'nav-link-active' : 'text-gray-500 hover:text-blue-500' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                contact
            </a>
        </div>

        <div class="flex items-center gap-3">
    @auth
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-5 border-l pl-6 border-gray-100">
                <div class="flex flex-col items-end leading-none">
                    <span class="text-[13px] font-bold text-gray-700 italic">{{ Auth::user()->name }}</span>
                    <span class="text-[9px] text-blue-500 uppercase font-black tracking-tighter mt-1">{{ Auth::user()->role }}</span>
                </div>
                
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit" 
                            class="group flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-red-100 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300">
                        <span class="text-[10px] font-black uppercase tracking-widest">Logout</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" 
                             fill="none" 
                             stroke="currentColor" 
                             viewBox="0 0 24 24" 
                             stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="px-4 py-1.5 border border-gray-300 rounded-md text-[11px] font-semibold text-gray-500 uppercase flex items-center gap-1.5 hover:bg-gray-50 transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3 3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg> 
            login
        </a>
        <a href="{{ route('register') }}" class="px-5 py-2 bg-[#0061FF] text-white rounded-md text-[11px] font-bold uppercase hover:bg-blue-700 transition shadow-sm">
            Register
        </a>
    @endauth
</div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-bg text-white pt-16 pb-12 px-16 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
            <div>
                <h4 class="font-bold text-lg mb-4">ServiceHub</h4>
                <p class="text-[11px] text-gray-400 leading-relaxed italic max-w-sm">Your trusted platform for professional services around the globe. Quality and excellence guaranteed.</p>
            </div>
            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest mb-6">Quick Links</h4>
                <ul class="text-[11px] text-gray-400 space-y-3">
                    <li><a href="{{ route('services.index') }}" class="hover:text-white transition">Services</a></li>
                    <li><a href="{{ route('bookings.index') }}" class="hover:text-white transition">My History</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest mb-6">Contact</h4>
                <div class="text-[11px] text-gray-400 space-y-2">
                    <p>Email: info@servicehub.com</p>
                    <p>Phone: +212 6 244 399 29</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-gray-700 mt-12 pt-8 text-center">
            <p class="text-[10px] text-gray-500 uppercase tracking-widest">© 2026 ServiceHub Inc. All rights reserved. Developed by Mohamed El Farh</p>
        </div>
    </footer>

</body>
</html>