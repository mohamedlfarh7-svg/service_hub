<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'total'     => Booking::where('user_id', $user->id)->count(),
            'pending'   => Booking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'confirmed' => Booking::where('user_id', $user->id)
                                 ->whereIn('status', ['confirmed', 'active'])
                                 ->count(),
            'completed' => Booking::where('user_id', $user->id)->where('status', 'completed')->count(),
        ];

        $totalSpent = Transaction::where('user_id', $user->id)
                                ->where('status', 'success')
                                ->sum('amount');

        $recentBookings = Booking::where('user_id', $user->id)
            ->with('service')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentBookings', 'totalSpent'));
    }
}