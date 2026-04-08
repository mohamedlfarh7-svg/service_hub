@extends('layouts.app')

@section('content')
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 tracking-tighter uppercase italic">Manage Bookings</h2>
                    <p class="text-blue-600 text-[10px] font-black uppercase tracking-[3px] mt-1">Admin Control Center</p>
                </div>
                <div class="bg-white p-3 rounded-[20px] shadow-sm border border-gray-100 font-black text-blue-600 text-xs px-6">
                    TOTAL: {{ $bookings->total() }}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($bookings as $booking)
                    <div class="bg-white rounded-[32px] border border-gray-100 p-8 shadow-sm group">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-black text-gray-900 uppercase italic">{{ $booking->service->title }}</h3>
                            <span class="text-[9px] font-bold px-3 py-1 bg-gray-100 rounded-full uppercase tracking-tighter">
                                {{ $booking->status }}
                            </span>
                        </div>
                        
                        <div class="flex items-center gap-3 mb-8 p-3 bg-gray-50 rounded-2xl">
                            <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center text-white font-bold uppercase">
                                {{ substr($booking->user->name, 0, 1) }}
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-black text-gray-800 uppercase">{{ $booking->user->name }}</span>
                                <span class="text-[10px] text-gray-400 italic">{{ $booking->user->email }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                        @if($booking->status === 'pending')
                            <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-100">
                                    Confirm
                                </button>
                            </form>

                            <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" class="w-full py-4 border-2 border-gray-100 text-gray-400 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:border-red-500 hover:text-red-500 transition-all">
                                    Reject
                                </button>
                            </form>
                        @else
                            <div class="col-span-2 py-3 text-center bg-gray-50 rounded-xl border border-dashed border-gray-200">
                                <span class="text-[10px] font-black uppercase tracking-[2px] text-gray-400 italic italic">
                                    Action Processed
                                </span>
                            </div>
                        @endif
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center py-20 text-gray-400 font-bold uppercase tracking-widest">No bookings found</p>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
@endsection