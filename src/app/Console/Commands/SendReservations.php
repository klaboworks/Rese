<?php

namespace App\Console\Commands;

use App\Mail\ReservationNotification;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reservations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reservations = Reservation::where('date',today())->get();

        foreach($reservations as $reservation){
            Mail::to($reservation->user->email)->send(new ReservationNotification($reservation));
        }
    }
}
