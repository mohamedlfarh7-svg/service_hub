<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BookingStatusUpdated;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::user()->role === 'admin') {
            abort(403);
        }

        $serviceId = $request->query('service_id');
        $service = Service::findOrFail($serviceId);

        return view('bookings.create', compact('service'));
    }

    public function index(Request $request)
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.bookings.index');
        }

        $query = Booking::where('user_id', Auth::id())->with('service');

        if ($request->has('status') && in_array($request->status, ['pending', 'accepted', 'cancelled', 'completed'])) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'admin') {
            abort(403);
        }

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        $service = Service::findOrFail($request->service_id);

        Booking::create([
            'user_id'      => Auth::id(),
            'client_id'    => Auth::id(),
            'service_id'   => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status'       => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Service booked successfully!');
    }

    public function destroy(Booking $booking)
    {
        if (Auth::user()->role !== 'admin' && $booking->user_id !== Auth::id()) {
            abort(403);
        }

        $booking->delete();

        return back()->with('success', 'Booking deleted.');
    }

    public function adminIndex()
    {
        $bookings = Booking::whereHas('service', function($query) {
            $query->where('provider_id', Auth::id()); 
        })->with(['user', 'service'])->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        if (Auth::user()->role !== 'admin' || $booking->service->provider_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:accepted,cancelled,completed'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', "Status updated to {$request->status} and user notified.");
    }
}