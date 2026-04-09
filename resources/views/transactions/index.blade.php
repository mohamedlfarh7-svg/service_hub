@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-16 bg-white min-h-screen">
    <div class="mb-12 ml-2">
        <h1 class="text-[26px] font-bold text-gray-900 tracking-tight">Transaction History</h1>
        <p class="text-gray-400 text-sm italic mt-1">Track all your payments and service costs</p>
    </div>

    <div class="w-full bg-white border border-gray-100 rounded-[30px] overflow-hidden shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Reference</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Service</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Date</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Amount</th>
                    <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-widest italic">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50/30 transition-colors">
                    <td class="px-8 py-6">
                        <span class="text-xs font-mono text-blue-600 font-bold">#{{ $transaction->transaction_reference }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm font-bold text-gray-800 italic">{{ $transaction->booking->service->title }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-xs text-gray-500">{{ $transaction->created_at->format('M d, Y') }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm font-black text-gray-900">${{ number_format($transaction->amount, 2) }}</p>
                    </td>
                    <td class="px-8 py-6">
                        @if($transaction->status == 'success')
                            <span class="px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-bold uppercase italic border border-green-100">Completed</span>
                        @elseif($transaction->status == 'pending')
                            <span class="px-4 py-1.5 bg-yellow-50 text-yellow-600 rounded-full text-[10px] font-bold uppercase italic border border-yellow-100">Pending</span>
                        @else
                            <span class="px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-bold uppercase italic border border-red-100">Failed</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-32 text-center">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <p class="text-gray-400 italic text-sm">No transactions found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $transactions->links() }}
    </div>
</div>
@endsection