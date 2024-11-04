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
        // Fetch current appointments
        $currentAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '<=', Carbon::now()->format('H:i:s'))
                ->where('end_time', '>=', Carbon::now()->format('H:i:s'));
        })->get();

        // Fetch upcoming appointments
        $upcomingAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '>', Carbon::now()->format('H:i:s'));
        })->get();

        // Fetch available timeslots
        $availableTimeslots = Timeslot::where('booked', false)
            ->where('date', '>=', Carbon::today()->format('Y-m-d'))
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('dashboard', compact('currentAppointments', 'upcomingAppointments', 'availableTimeslots'));
    }
}
