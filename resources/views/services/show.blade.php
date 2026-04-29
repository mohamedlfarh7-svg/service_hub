@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-8 py-12">
    <a href="{{ route('services.index') }}" class="flex items-center text-blue-500 text-sm font-medium mb-8 hover:underline group transition-all">
        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Services
    </a>

    <div class="grid md:grid-cols-2 gap-12 items-start mb-16">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl bg-gray-100">
            @if($service->image)
                <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/services/' . $service->image) }}" 
                     class="w-full h-[450px] object-cover transition-transform duration-700 hover:scale-105">
            @else
                <div class="w-full h-[450px] flex items-center justify-center bg-gray-200">
                    <span class="text-gray-400 font-black italic uppercase tracking-widest text-xl">{{ $service->title }}</span>
                </div>
            @endif
        </div>

        <div class="space-y-6">
            <span class="inline-block bg-blue-50 text-blue-500 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">
                {{ $service->category->name ?? 'General' }}
            </span>
            
            <h1 class="text-4xl font-extrabold text-gray-900 leading-tight tracking-tight">{{ $service->title }}</h1>

            <div class="flex items-center space-x-4">
                <div class="flex items-center text-lg text-gray-700">
                    <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Price: <span class="text-blue-600 font-black ml-1">${{ number_format($service->price, 0) }}</span></span>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-xs font-black text-gray-400 mb-3 uppercase tracking-[3px]">Description</h4>
                <p class="text-gray-600 text-base leading-relaxed italic">
                    {{ $service->description }}
                </p>
            </div>

            <div class="pt-6">
                @auth
                    @if(auth()->user()->role !== 'admin')
                        <a href="{{ route('bookings.create', ['service_id' => $service->id]) }}" 
                           class="inline-block w-full text-center px-10 py-5 bg-blue-600 text-white rounded-2xl font-black uppercase italic tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-100 hover:-translate-y-1">
                            Book This Service Now
                        </a>
                    @else
                        <div class="px-6 py-4 bg-gray-50 border border-dashed border-gray-200 text-gray-400 rounded-xl font-black uppercase italic text-center cursor-not-allowed tracking-widest">
                            Admin View Only
                        </div>
                    @endif
                @else
                    <div class="space-y-4">
                        <a href="{{ route('login') }}" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase italic tracking-widest flex items-center justify-center hover:bg-black transition-all shadow-lg">
                            Login to Book
                        </a>
                        <p class="text-center text-gray-400 text-[10px] italic uppercase tracking-[4px] font-bold">Authentication required</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8 mb-20">
        <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-sm font-black text-gray-800 mb-6 italic uppercase tracking-widest border-b pb-2">What's Included</h3>
            <ul class="space-y-4 text-sm text-gray-500">
                <li class="flex items-center"><span class="text-blue-500 mr-3 font-bold text-lg">✓</span> Professional consultation</li>
                <li class="flex items-center"><span class="text-blue-500 mr-3 font-bold text-lg">✓</span> Detailed analysis</li>
                <li class="flex items-center"><span class="text-blue-500 mr-3 font-bold text-lg">✓</span> Follow-up support</li>
            </ul>
        </div>

        <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-sm font-black text-gray-800 mb-6 italic uppercase tracking-widest border-b pb-2">Requirements</h3>
            <ul class="space-y-4 text-sm text-gray-500">
                <li class="flex items-center"><span class="text-gray-300 mr-4 font-bold">•</span> Booking confirmation</li>
                <li class="flex items-center"><span class="text-gray-300 mr-4 font-bold">•</span> Identity verification</li>
                <li class="flex items-center"><span class="text-gray-300 mr-4 font-bold">•</span> Payment confirmation</li>
            </ul>
        </div>

        <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-sm font-black text-gray-800 mb-6 italic uppercase tracking-widest border-b pb-2">Cancellation</h3>
            <p class="text-sm text-gray-500 leading-relaxed italic">
                Free cancellation up to 24 hours before the appointment starts. Policy applies to all standard bookings.
            </p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto border-t border-gray-100 pt-16">
        <h2 class="text-3xl font-black text-gray-900 mb-10 italic uppercase tracking-tighter">Client Reviews</h2>

        @auth
            <div class="bg-gray-50 p-8 rounded-[2rem] border border-gray-100 mb-12">
                <h4 class="text-xs font-black text-gray-400 mb-6 uppercase tracking-[3px]">Leave a Review</h4>
                
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-gray-700 mb-3 uppercase italic">Your Rating</span>
                        <div class="flex flex-row-reverse justify-end">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required />
                                <label for="star{{ $i }}" class="cursor-pointer text-gray-300 peer-hover:text-yellow-400 peer-checked:text-yellow-400 transition-all duration-200 p-1">
                                    <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                    </div>

                    <div>
                        <textarea name="comment" rows="4" 
                            class="w-full px-5 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-blue-500 transition-all outline-none text-sm italic bg-white shadow-sm"
                            placeholder="Share your experience with this service..." required></textarea>
                    </div>

                    <button type="submit" class="bg-gray-900 text-white px-10 py-4 rounded-xl font-black uppercase text-xs tracking-widest hover:bg-blue-600 transition-all shadow-lg hover:-translate-y-0.5">
                        Submit Review
                    </button>
                </form>
            </div>
        @else
            <div class="bg-blue-50 p-8 rounded-3xl text-center mb-12 border border-blue-100">
                <p class="text-sm text-blue-600 font-bold uppercase tracking-widest">
                    You must be <a href="{{ route('login') }}" class="underline decoration-2">logged in</a> to leave a review.
                </p>
            </div>
        @endauth

        <div class="space-y-10">
            @forelse($service->reviews ?? [] as $review)
                <div class="group">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h5 class="font-black text-gray-800 uppercase italic text-sm tracking-tight">{{ $review->user->name }}</h5>
                            <span class="text-[10px] text-gray-400 uppercase tracking-widest">{{ $review->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex text-yellow-400 bg-yellow-50 px-3 py-1 rounded-full">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3 h-3 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-200' }}" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed italic border-l-2 border-gray-100 pl-4 group-hover:border-blue-400 transition-colors">
                        "{{ $review->comment }}"
                    </p>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-gray-400 text-sm italic uppercase tracking-widest font-bold">No reviews yet. Be the first to share!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection