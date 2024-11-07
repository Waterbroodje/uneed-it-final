<?php
// app/Http/Controllers/AdminDashboardController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch current appointments with pagination
        $currentAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '<=', Carbon::now()->format('H:i:s'))
                ->where('end_time', '>=', Carbon::now()->format('H:i:s'));
        })->paginate(5, ['*'], 'current_page');

        // Fetch upcoming appointments with pagination
        $upcomingAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '>', Carbon::now()->format('H:i:s'));
        })->paginate(5, ['*'], 'upcoming_page');

        // Fetch available timeslots with pagination
        $availableTimeslots = Timeslot::where('booked', false)
            ->where('date', '>=', Carbon::today()->format('Y-m-d'))
            ->orderBy('date')
            ->orderBy('start_time')
            ->paginate(9, ['*'], 'available_page');

        return view('dashboard', compact('currentAppointments', 'upcomingAppointments', 'availableTimeslots'));
    }
}
