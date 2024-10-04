<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $startDate = Carbon::today();  // Start from today
        $days = 30;  // Number of days to generate slots for

        for ($day = 0; $day < $days; $day++) {
            $currentDate = $startDate->copy()->addDays($day);

            // Generate timeslots from 09:00 to 16:00, 30 minutes apart
            $startTime = Carbon::createFromTime(9, 0);  // Start at 09:00
            $endTime = Carbon::createFromTime(16, 0);   // End at 16:00

            while ($startTime->lt($endTime)) {
                Timeslot::create([
                    'start_time' => $startTime->format('H:i:s'),
                    'end_time' => $startTime->copy()->addMinutes(30)->format('H:i:s'),
                    'date' => $currentDate->format('Y-m-d')
                ]);

                // Move to the next 30-minute slot
                $startTime->addMinutes(30);
            }
        }
    }
}
