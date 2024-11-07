<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;


  // app/Models/Timeslot.php
protected $fillable = ['date', 'start_time', 'end_time', 'booked'];

    // Define the relationship with Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
