@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-20">
    <div class="mb-16 pb-8 border-b border-gray-100 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tighter mb-2">Inbox</h1>
            <p class="text-gray-400 text-sm font-medium tracking-wide">Manage your service updates and activities.</p>
        </div>
        <div class="text-right">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full">
                {{ auth()->user()->unreadNotifications->count() }} unread
            </span>
        </div>
    </div>

    <div class="space-y-1">
        @forelse($notifications as $notification)
            <div class="group relative py-8 px-4 transition-all duration-500 hover:bg-gray-50 rounded-[20px] {{ $notification->read_at ? 'opacity-50' : '' }}">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    
                    <div class="flex-1">
                        <div class="mb-3 flex items-center gap-3">
                            <span class="text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded border {{ $notification->data['status'] === 'accepted' ? 'border-green-200 text-green-600' : ($notification->data['status'] === 'cancelled' ? 'border-red-200 text-red-600' : 'border-gray-200 text-gray-500') }}">
                                {{ $notification->data['status'] ?? 'Update' }}
                            </span>
                            <span class="text-[10px] text-gray-300 font-mono">{{ $notification->created_at->format('M d, H:i') }}</span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 leading-snug tracking-tight mb-1">
                            {{ $notification->data['message'] }}
                        </h3>
                        
                        <p class="text-xs text-gray-400 font-medium">
                            Service ID: #{{ $notification->data['booking_id'] }} — {{ $notification->created_at->diffForHumans() }}
                        </p>
                    </div>

                    @if(!$notification->read_at)
                        <div class="flex items-center">
                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                @csrf 
                                @method('PATCH')
                                <button class="text-[10px] font-black uppercase tracking-[0.15em] py-3 px-6 border border-gray-200 rounded-full hover:bg-black hover:text-white hover:border-black transition-all duration-300">
                                    Mark as read
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                @if(!$notification->read_at)
                    <div class="absolute left-[-15px] top-1/2 -translate-y-1/2 w-1.5 h-1.5 bg-blue-600 rounded-full shadow-[0_0_10px_rgba(37,99,235,0.5)]"></div>
                @endif
            </div>
            
            <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-gray-100 to-transparent"></div>

        @empty
            <div class="py-32 text-center">
                <p class="text-sm font-bold text-gray-300 uppercase tracking-[0.3em]">Your inbox is empty</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-20">
        {{ $notifications->links() }}
    </div>
</div>

<style>
    /* تخصيص بسيط للـ Pagination باش يجي مع الـ Design */
    .pagination { @apply flex justify-center gap-2; }
    .page-item.active .page-link { @apply bg-black border-black text-white; }
    .page-link { @apply rounded-full px-4 py-2 text-xs font-bold border-gray-100 text-gray-400 transition-all hover:bg-gray-50; }
</style>
@endsection