<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BookingStatusUpdated extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'service_name' => $this->booking->service->title,
            'status' => $this->booking->status,
            'message' => "Your booking for '{$this->booking->service->title}' has been {$this->booking->status}."
        ];
    }
}
