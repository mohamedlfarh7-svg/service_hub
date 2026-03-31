<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = ['booking_id', 'user_id', 'reason', 'status'];

    public function booking() {
        return $this->belongsTo(Booking::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}