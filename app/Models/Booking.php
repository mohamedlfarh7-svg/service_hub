<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id','client_id','total_points', 'service_id', 'status', 'booking_date'];
    protected $casts = [
    'booking_date' => 'date',
];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
    
}
