<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ServiceHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

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
            <a href="/" class="text-blue-600 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> 
                home
            </a>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">About</a>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">services</a>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">contact</a>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}" class="px-4 py-2 border border-gray-300 rounded text-[10px] font-bold text-gray-600 uppercase flex items-center gap-1 hover:bg-gray-50 transition">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg> 
                Login
            </a>
            <a href="{{ route('register') }}" class="px-5 py-2 bg-[#0061FF] text-white rounded text-[10px] font-bold uppercase hover:bg-blue-700 transition">
                Register
            </a>
        </div>
    </nav>

    <div class="flex-grow flex items-center justify-center p-6 py-12">
        <div class="bg-white w-full max-w-[450px] p-10 rounded-[30px] shadow-[0_10px_50px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col items-center">
            
            <div class="w-20 h-20 bg-cyan-100 rounded-full flex items-center justify-center mb-4">
                <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mb-1">Register</h1>
            <p class="text-gray-400 text-sm mb-8 text-center">Create your account to start exchanging services</p>

            <form action="{{ route('register') }}" method="POST" class="w-full space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                    <input type="text" name="name" placeholder="John Doe" required
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all text-sm text-gray-600">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                    <input type="email" name="email" placeholder="your@gmail.com" required
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all italic text-sm text-gray-600">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••" required
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all text-sm text-gray-600">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" required
                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all text-sm text-gray-600">
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-[0.98] mt-2 uppercase text-xs tracking-widest">
                    Create Account
                </button>
            </form>

            <p class="mt-8 text-sm text-gray-500">
                Already have an account? <a href="/login" class="text-blue-500 font-bold hover:underline transition">Login</a>
            </p>
        </div>
    </div>

    <footer class="bg-[#2D2D3A] text-white py-12 px-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <h3 class="font-bold text-lg mb-4">ServiceHub</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Your trusted platform for professional services exchange.</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4">Quick Links</h3>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4">Contact</h3>
                <p class="text-gray-400 text-sm">Email: info@servicehub.com</p>
                <p class="text-gray-400 text-sm mt-1">Phone: +212 6 244 399 29</p>
            </div>
        </div>
        <div class="text-center text-gray-500 text-[10px] mt-12 border-t border-gray-700 pt-6 uppercase tracking-[0.2em]">
            © 2026 ServiceHub. All rights reserved.
        </div>
    </footer>

</body>
</html>