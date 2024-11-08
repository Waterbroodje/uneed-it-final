<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Ensure this is included

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'timeslot_id',
        'name',
        'email',
        'reason',
        'phone',
    ];

    // Define the relationship with Timeslot
    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

}
