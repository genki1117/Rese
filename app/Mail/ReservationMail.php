<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $today_reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($today_reservation)
    {
        $this->$today_reservation = $today_reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservation')
                    ->with(['today_reservation' => $this->today_reservation])
                    ->subject('確認メール');
    }
}
