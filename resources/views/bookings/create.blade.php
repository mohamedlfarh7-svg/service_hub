@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-[32px] font-black text-gray-900 mb-10 italic uppercase tracking-tighter">Reserve Your Service</h1>

    <div class="bg-white rounded-[40px] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-50">
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            
            {{-- Service Selection Replacement (Luxury Card) --}}
            <div class="mb-10">
                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[3px] mb-4 italic">Selected Experience</label>
                <div class="relative p-8 rounded-[30px] bg-gray-900 text-white overflow-hidden group">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-black italic uppercase tracking-tight">{{ $service->title }}</h3>
                            <p class="text-blue-400 text-xs font-bold mt-1 uppercase tracking-widest">Premium Category</p>
                        </div>
                        <div class="text-right">
                            <span class="text-3xl font-black italic tracking-tighter text-blue-500">${{ number_format($service->price, 0) }}</span>
                        </div>
                    </div>
                    {{-- Decorative Background Element --}}
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-600/10 rounded-full blur-3xl group-hover:bg-blue-600/20 transition-all"></div>
                </div>
                
                {{-- Hidden input to send service_id to store() --}}
                <input type="hidden" name="service_id" value="{{ $service->id }}">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
                <div>
                    <label class="block text-[11px] font-black text-gray-900 uppercase tracking-[2px] mb-3 italic">Choose Date</label>
                    <input type="date" name="booking_date" required
                           class="w-full px-6 py-5 border border-gray-100 bg-gray-50/50 rounded-2xl focus:ring-4 focus:ring-blue-500/5 focus:border-blue-600 focus:bg-white outline-none transition-all font-bold text-gray-700">
                    @error('booking_date') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-[11px] font-black text-gray-900 uppercase tracking-[2px] mb-3 italic">Set Time</label>
                    <div class="relative">
                        <select name="booking_time" required
                                class="w-full px-6 py-5 border border-gray-100 bg-gray-50/50 rounded-2xl focus:ring-4 focus:ring-blue-500/5 focus:border-blue-600 focus:bg-white outline-none transition-all font-bold text-gray-700 appearance-none">
                            <option value="" disabled selected>Select an hour</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                        </select>
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    @error('booking_time') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-12">
                <label class="block text-[11px] font-black text-gray-900 uppercase tracking-[2px] mb-3 italic">Personal Requests</label>
                <textarea name="notes" rows="4" placeholder="Share any specific details or preferences..." 
                          class="w-full px-6 py-5 border border-gray-100 bg-gray-50/50 rounded-2xl focus:ring-4 focus:ring-blue-500/5 focus:border-blue-600 focus:bg-white outline-none transition-all font-bold text-gray-700 resize-none"></textarea>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-6 rounded-[24px] font-black uppercase tracking-[3px] italic shadow-[0_20px_40px_rgba(37,99,235,0.2)] hover:bg-blue-700 hover:shadow-[0_25px_50px_rgba(37,99,235,0.3)] transition-all flex items-center justify-center gap-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Confirm Luxury Reservation
            </button>
        </form>
    </div>
</div>
@endsection