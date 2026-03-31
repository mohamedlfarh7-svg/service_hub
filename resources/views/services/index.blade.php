<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub - Our Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #ffffff; }
        .nav-link { color: #6B7280; font-size: 14px; transition: all 0.3s; display: flex; align-items: center; gap: 4px; }
        .nav-link:hover { color: #2563EB; }
        .active-link { color: #2563EB; font-weight: 500; }
        .search-container { position: relative; max-width: 850px; margin: 0 auto; }
        .search-input { width: 100%; padding: 14px 20px 14px 50px; border: 1px solid #E5E7EB; border-radius: 8px; font-size: 14px; }
        .filter-btn { padding: 8px 24px; border-radius: 8px; font-size: 13px; font-weight: 500; border: 1px solid #E5E7EB; color: #374151; transition: all 0.2s; }
        .filter-btn.active { background-color: #2563EB; color: white; border-color: #2563EB; }
        .service-card { border: 1px solid #F3F4F6; border-radius: 12px; overflow: hidden; transition: transform 0.2s; background: white; }
        .service-card:hover { transform: translateY(-4px); }
    </style>
</head>
<body>

    <nav class="flex items-center justify-between px-20 py-4 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-cyan-400 rounded-md flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <span class="text-lg font-semibold text-gray-800 tracking-tight">serviceHub</span>
        </div>

        <div class="flex items-center gap-10">
            <a href="{{ url('/dashboard') }}" class="nav-link">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                home
            </a>
            <a href="{{ url('/bookings') }}" class="nav-link">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                bookings
            </a>
            <a href="{{ url('/services') }}" class="nav-link active-link">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                services
            </a>
            <a href="{{ url('/profile') }}" class="nav-link">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                profile
            </a>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-[12px] font-bold text-gray-700 italic uppercase">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </nav>

    <div class="text-center mt-20 mb-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Our Services</h1>
        <p class="text-gray-500 text-sm">Browse our wide range of professional services</p>
    </div>

    <div class="search-container px-6 mb-8">
        <svg class="absolute left-10 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <input type="text" placeholder="Search services..." class="search-input outline-none focus:border-blue-300 transition">
    </div>

    <div class="flex justify-center gap-4 mb-16">
        <button class="filter-btn active">All Services</button>
        <button class="filter-btn">Consulting</button>
        <button class="filter-btn">Support</button>
        <button class="filter-btn">Design</button>
        <button class="filter-btn">Marketing</button>
    </div>

    <div class="max-w-7xl mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        @forelse($services as $service)
        <div class="service-card shadow-sm hover:shadow-md transition">
            <img src="{{ $service->image ?? 'https://via.placeholder.com/400x200' }}" class="w-full h-48 object-cover border-b">
            <div class="p-6">
                <h3 class="font-bold text-gray-800 text-[15px] mb-2">{{ $service->title }}</h3>
                <p class="text-gray-400 text-[11px] mb-6 leading-relaxed">{{ Str::limit($service->description, 80) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-blue-600 font-bold text-sm">${{ number_format($service->price, 2) }}</span>
                    <a href="{{ route('services.show', $service->id) }}" class="text-[10px] font-bold text-blue-500 uppercase hover:underline">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center text-gray-400 italic py-20">No services found in database.</div>
        @endforelse
    </div>

    <footer class="bg-[#2D2D3A] text-white py-16 px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
            <div>
                <h3 class="font-bold text-lg mb-6">ServiceHub</h3>
                <p class="text-gray-400 text-xs leading-relaxed italic">Your trusted platform for professional services.</p>
            </div>
            <div>
                <h3 class="font-bold text-sm mb-6 uppercase tracking-wider">Quick Links</h3>
                <ul class="text-gray-400 text-xs space-y-3">
                    <li><a href="{{ url('/services') }}" class="hover:text-white transition">All Services</a></li>
                    <li><a href="{{ url('/bookings') }}" class="hover:text-white transition">My Bookings</a></li>
                    <li><a href="{{ url('/profile') }}" class="hover:text-white transition">Profile Settings</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-sm mb-6 uppercase tracking-wider">Support</h3>
                <p class="text-gray-400 text-xs italic">Email: info@servicehub.com</p>
                <p class="text-gray-400 text-xs mt-2 italic">Phone: +212 6 244 399 29</p>
            </div>
        </div>
        <div class="mt-20 pt-8 border-t border-gray-700 text-center text-[10px] text-gray-500 uppercase tracking-widest">
            © 2026 ServiceHub. Developed by Mohamed El Farh.
        </div>
    </footer>

</body>
</html>