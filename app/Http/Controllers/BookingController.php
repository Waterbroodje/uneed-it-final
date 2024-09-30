<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::all(); // Fetch all timeslots from the database
        return view('book', compact('timeslots')); // Pass the timeslots to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'timeslot_id' => 'required|exists:timeslots,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:bookings,email',
        ]);

        Booking::create($request->all()); // Create a new booking

        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}
