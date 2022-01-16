<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationMail;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ReservationUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to reservation user reservation to today';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $today_reservations = Reservation::wheredate('started_at', '2022-01-17')->with('user')->get();
        foreach($today_reservations as $today_reservation){
            return Mail::to($today_reservation->user->email)->send(new ReservationMail($today_reservation));
        }
    }
}
