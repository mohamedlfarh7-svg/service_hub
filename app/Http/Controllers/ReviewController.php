<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500'
    ]);

    Review::create([
        'user_id'    => auth()->id(),
        'service_id' => $request->service_id,
        'rating'     => $request->rating,
        'comment'    => $request->comment,
        ]);

    return back()->with('success', 'Review submitted!');
}
}
