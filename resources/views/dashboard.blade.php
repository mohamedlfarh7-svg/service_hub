<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background-color: #2447B3; } /* نفس لون الهيرو من Figma */
        .footer-bg { background-color: #2D2D3A; } /* لون الفوتر الداكن */
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
            <a href="{{ url('/') }}" class="text-blue-600 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> 
                home
            </a>
            <a href="{{ url('/bookings') }}" class="text-gray-500 hover:text-blue-600 transition">My Bookings</a>
            <a href="{{ url('/services') }}" class="text-gray-500 hover:text-blue-600 transition">services</a>
            <a href="{{ url('/profile') }}" class="text-gray-500 hover:text-blue-600 transition">profile</a>
        </div>

        <div class="flex items-center gap-4 border-l pl-4 border-gray-100">
            <span class="text-[11px] font-bold text-gray-800 italic uppercase">Mohamed El Farh</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </nav>

    <header class="hero-bg py-20 text-center text-white">
        <h1 class="text-4xl font-bold mb-3 tracking-tight italic">Welcome Back to Your Dashboard</h1>
        <p class="text-blue-100 mb-8 text-sm opacity-90 font-light">Manage your bookings and explore new services</p>
        <div class="flex justify-center gap-4">
            <a href="{{ url('/services') }}" class="bg-white text-blue-700 px-8 py-2.5 rounded font-bold text-[11px] shadow-lg hover:bg-gray-100 transition">
                Browse Services
            </a>
            <a href="{{ url('/bookings') }}" class="border border-blue-400 px-8 py-2.5 rounded font-bold text-[11px] hover:bg-white/10 transition">
                View My Bookings
            </a>
        </div>
    </header>

    <section class="py-16">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-12 italic">Your Activity Summary</h2>
        <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">08</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Completed</span>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">02</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Active Now</span>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">Gold</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Membership</span>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="text-blue-500">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <span class="text-[18px] font-bold text-gray-800 italic">$1,200</span>
                <span class="text-[9px] font-bold italic text-gray-400 uppercase tracking-widest">Total Spent</span>
            </div>
        </div>
    </section>

    <section class="py-12 px-8 md:px-16 bg-white border-t border-gray-50">
        <h2 class="text-2xl font-bold text-center italic text-gray-800 mb-12">Recommended for You</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden hover:-translate-y-1 transition duration-300">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=400&h=250&auto=format&fit=crop" class="h-44 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 mb-1 text-sm italic">Consultation Service</h3>
                    <p class="text-[10px] text-gray-400 mb-6 italic">Professional consultation for your business needs</p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-blue-600 font-bold text-base">$150</span>
                        <a href="#" class="text-[10px] font-bold text-blue-500 uppercase tracking-tighter hover:underline">Book Again</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden hover:-translate-y-1 transition duration-300">
                <img src="https://images.unsplash.com/photo-1573161158332-5444389b254d?q=80&w=400&h=250&auto=format&fit=crop" class="h-44 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 mb-1 text-sm italic leading-tight">Technical Support</h3>
                    <p class="text-[10px] text-gray-400 mb-6 italic">Expert technical support and troubleshooting</p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-blue-600 font-bold text-base">$150</span>
                        <a href="#" class="text-[10px] font-bold text-blue-500 uppercase tracking-tighter hover:underline">Book Again</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden hover:-translate-y-1 transition duration-300">
                <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=400&h=250&auto=format&fit=crop" class="h-44 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 mb-1 text-sm italic leading-tight">Design Services</h3>
                    <p class="text-[10px] text-gray-400 mb-6 italic">Creative design solutions for your brand</p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-blue-600 font-bold text-base">$150</span>
                        <a href="#" class="text-[10px] font-bold text-blue-500 uppercase tracking-tighter hover:underline">Book Again</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-bg text-white py-12 px-10 mt-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <h3 class="font-bold text-lg mb-4 italic">ServiceHub</h3>
                <p class="text-gray-400 text-sm italic">Your trusted platform for professional services.</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 italic uppercase text-[12px] tracking-widest">Navigation</h3>
                <ul class="text-gray-400 text-sm space-y-2 italic">
                    <li><a href="#" class="hover:text-blue-400 transition">My History</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Settings</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Support</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 italic uppercase text-[12px] tracking-widest">Support</h3>
                <p class="text-gray-400 text-sm italic">Email: info@servicehub.com</p>
                <p class="text-gray-400 text-sm mt-1 italic">Phone: +212 6 244 399 29</p>
            </div>
        </div>
        <div class="text-center text-gray-500 text-xs mt-12 border-t border-gray-700 pt-6 uppercase tracking-widest">
            © 2026 ServiceHub. Managed by Mohamed El Farh.
        </div>
    </footer>

</body>
</html>