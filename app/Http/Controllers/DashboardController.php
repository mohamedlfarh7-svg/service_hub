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

        $totalSpent = Transaction::where('user_id', $user->id)->sum('amount');

        $activeBookingsCount = Booking::where('user_id', $user->id)
                                    ->where('status', 'active')
                                    ->count();

        $recentBookings = Booking::where('user_id', $user->id)
                                ->with('service')
                                ->latest()
                                ->take(3)
                                ->get();

        return view('dashboard', compact('totalSpent', 'activeBookingsCount', 'recentBookings'));
    }
}