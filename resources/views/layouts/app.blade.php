<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub - @yield('title', 'Professional Services')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background-color: #2447B3; }
        .footer-bg { background-color: #2D2D3A; }
    </style>
</head>
<body class="bg-white">

    <nav class="flex items-center justify-between px-16 py-4 bg-white border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="text-[#00D1FF]">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="8" width="18" height="12" rx="2" ry="2"></rect>
                    <path d="M7 8V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"></path>
                    <line x1="3" y1="13" x2="21" y2="13"></line>
                </svg>
            </div>
            <span class="text-xl font-bold text-gray-700">serviceHub</span>
        </div>
        
        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-blue-600' : 'text-gray-500' }} flex items-center gap-1 font-bold italic transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> 
                home
            </a>
            <a href="{{ url('/services') }}" class="{{ Request::is('services*') ? 'text-blue-600' : 'text-gray-500' }} hover:text-blue-600 transition font-bold italic">services</a>
            <a href="{{ url('/bookings') }}" class="{{ Request::is('bookings*') ? 'text-blue-600' : 'text-gray-500' }} hover:text-blue-600 transition font-bold italic">bookings</a>
            <a href="{{ url('/profile') }}" class="{{ Request::is('profile*') ? 'text-blue-600' : 'text-gray-500' }} hover:text-blue-600 transition font-bold italic">profile</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <div class="flex items-center gap-4">
                    <span class="text-[11px] font-bold text-gray-700 italic uppercase border-r pr-4 border-gray-200">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 rounded text-[10px] font-bold uppercase hover:bg-red-100 transition flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 border border-gray-300 rounded text-[10px] font-bold text-gray-600 uppercase flex items-center gap-1 hover:bg-gray-50 transition">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg> 
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2 bg-[#0061FF] text-white rounded text-[10px] font-bold uppercase hover:bg-blue-700 transition shadow-sm">
                    Register
                </a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-bg text-white pt-16 pb-12 px-16">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-12">
                <div>
                    <h4 class="font-bold text-lg mb-4 italic">ServiceHub</h4>
                    <p class="text-[11px] text-gray-400 leading-relaxed italic max-w-[250px]">Your trusted platform for professional services around the globe.</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest mb-6 italic text-gray-300">Quick Links</h4>
                    <ul class="text-[11px] text-gray-400 space-y-3 font-bold italic">
                        <li><a href="{{ url('/services') }}" class="hover:text-blue-400 transition underline decoration-gray-700">Services</a></li>
                        <li><a href="{{ url('/bookings') }}" class="hover:text-blue-400 transition underline decoration-gray-700">My History</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition underline decoration-gray-700">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest mb-6 italic text-gray-300">Contact</h4>
                    <div class="text-[11px] text-gray-400 space-y-2 italic font-medium">
                        <p>Email: info@servicehub.com</p>
                        <p>Phone: +212 6 244 399 29</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 flex justify-between items-center">
                <p class="text-[10px] text-gray-500 uppercase tracking-[0.2em]">© 2026 ServiceHub Inc. All rights reserved.</p>
                <p class="text-[10px] text-gray-500 uppercase tracking-widest italic font-bold">Developed by Mohamed El Farh</p>
            </div>
        </div>
    </footer>

</body>
</html>