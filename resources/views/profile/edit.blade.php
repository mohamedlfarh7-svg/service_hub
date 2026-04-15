@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-10 py-16 bg-white min-h-screen">

    <div class="w-full max-w-4xl mx-auto bg-white border border-gray-200 rounded-[30px] p-16 shadow-[0_15px_40px_-20px_rgba(0,0,0,0.1)]">
        
        <div class="flex items-center justify-between mb-16">
            <div class="flex items-center gap-6">
                <div class="text-[#0066FF]">
                    <svg width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                        <circle cx="12" cy="8" r="5"></circle>
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-[22px] font-bold text-gray-900 mb-1 lowercase">{{ $user->name }}</h2>
                    <p class="text-gray-400 text-sm italic mb-1">{{ $user->email }}</p>
                    <p class="text-[#0066FF] text-[13px] font-medium lowercase">{{ $user->role }}</p>
                </div>
            </div>

            <form action="{{ route('user.switch-role') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="flex items-center gap-3 px-6 py-3 bg-gray-900 border border-blue-500/20 rounded-2xl font-black text-[10px] text-blue-400 uppercase tracking-[2px] italic hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-xl shadow-blue-500/5 group">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Switch to {{ $user->role === 'admin' ? 'user' : 'admin' }}
                </button>
            </form>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
            @csrf
            @method('PATCH')

            <div class="space-y-2">
                <label class="block text-[12px] text-gray-500 italic ml-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                       class="w-full px-5 py-3 border border-gray-300 rounded-xl text-xs text-gray-600 outline-none focus:border-blue-400 italic">
            </div>

            <div class="space-y-2">
                <label class="block text-[12px] text-gray-500 italic ml-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                       class="w-full px-5 py-3 border border-gray-300 rounded-xl text-xs text-gray-600 outline-none focus:border-blue-400 italic">
            </div>

            <div class="space-y-2">
                <label class="block text-[12px] text-gray-500 italic ml-2">Password</label>
                <input type="password" name="password" placeholder="........."
                       class="w-full px-5 py-3 border border-gray-300 rounded-xl text-xs text-gray-600 outline-none focus:border-blue-400 italic placeholder:text-gray-500">
            </div>

            <div class="space-y-2">
                <label class="block text-[12px] text-gray-500 italic ml-2">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="........."
                       class="w-full px-5 py-3 border border-gray-300 rounded-xl text-xs text-gray-600 outline-none focus:border-blue-400 italic placeholder:text-gray-500">
            </div>

            <div class="pt-10">
                <button type="submit" 
                        class="w-full bg-[#0055FF] text-white py-4 rounded-xl font-bold text-[15px] flex items-center justify-center gap-3 shadow-lg shadow-blue-100 hover:bg-blue-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection