<?php

namespace App\Http\Controllers;

use App\Models\Dispute;
use Illuminate\Http\Request;

class DisputeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'reason' => 'required|string|min:20',
        ]);

        Dispute::create([
            'user_id' => auth()->id(),
            'booking_id' => $request->booking_id,
            'reason' => $request->reason,
            'status' => 'open'
        ]);

        return back()->with('success', 'Dispute opened. Admin will review it.');
    }
}