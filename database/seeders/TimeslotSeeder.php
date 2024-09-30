<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Timeslot;

class TimeslotSeeder extends Seeder
{
    public function run()
    {
        Timeslot::class::create(['start_time' => '09:00:00', 'end_time' => '10:00:00']);
        Timeslot::class::create(['start_time' => '10:00:00', 'end_time' => '11:00:00']);
        Timeslot::class::create(['start_time' => '11:00:00', 'end_time' => '12:00:00']);
        Timeslot::class::create(['start_time' => '13:00:00', 'end_time' => '14:00:00']);
        Timeslot::class::create(['start_time' => '14:00:00', 'end_time' => '15:00:00']);
    }
}
