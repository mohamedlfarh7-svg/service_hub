@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-16 bg-white min-h-screen">
    <div class="text-center mb-16">
        <h1 class="text-3xl font-bold text-gray-800">Contact Us</h1>
        <p class="text-gray-500 mt-2">We'd love to hear from you</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-6xl mx-auto">
        
        <div class="bg-white border border-gray-100 rounded-[30px] p-10 shadow-[0_10px_40px_rgba(0,0,0,0.04)]">
            <h2 class="text-xl font-bold text-gray-800 mb-8">Send us a Message</h2>
            <form action="#" class="space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 ml-1">Name</label>
                    <input type="text" placeholder="Your name" class="w-full px-5 py-3 border border-gray-200 rounded-xl outline-none focus:border-blue-400 transition text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 ml-1">Email</label>
                    <input type="email" placeholder="your@email.com" class="w-full px-5 py-3 border border-gray-200 rounded-xl outline-none focus:border-blue-400 transition text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 ml-1">Subject</label>
                    <input type="text" placeholder="How can we help?" class="w-full px-5 py-3 border border-gray-200 rounded-xl outline-none focus:border-blue-400 transition text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 ml-1">Message</label>
                    <textarea rows="4" placeholder="Your message..." class="w-full px-5 py-3 border border-gray-200 rounded-xl outline-none focus:border-blue-400 transition text-sm"></textarea>
                </div>
                <button class="w-full bg-[#0061FF] text-white py-4 rounded-xl font-bold text-sm shadow-lg hover:bg-blue-700 transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Send Message
                </button>
            </form>
        </div>

        <div class="space-y-6">
            <div class="bg-white border border-gray-100 rounded-[30px] p-10 shadow-[0_10px_40px_rgba(0,0,0,0.04)]">
                <h3 class="text-xl font-bold text-gray-800 mb-8">Contact Information</h3>
                
                <div class="space-y-8">
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Email</h4>
                            <p class="text-sm text-gray-500 mt-1">info@servicehub.com</p>
                            <p class="text-sm text-gray-500">support@servicehub.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Phone</h4>
                            <p class="text-sm text-gray-500 mt-1">+212 (6) 244 399 29</p>
                            <p class="text-sm text-gray-500">+212 (6) 016 456 37</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Address</h4>
                            <p class="text-sm text-gray-500 mt-1">123 Business Street</p>
                            <p class="text-sm text-gray-500">City, State 12345, Country</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-[#E6F2FF] rounded-[30px] p-10">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Office Hours</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <p class="flex justify-between"><span>Monday - Friday:</span> <span class="font-bold">9:00 AM - 6:00 PM</span></p>
                    <p class="flex justify-between"><span>Saturday:</span> <span class="font-bold">10:00 AM - 4:00 PM</span></p>
                    <p class="flex justify-between"><span>Sunday:</span> <span class="font-bold">Closed</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection