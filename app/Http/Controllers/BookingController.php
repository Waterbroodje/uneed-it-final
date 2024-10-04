<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::where('date', '>=', Carbon::today())
            ->orderBy('date')
            ->get()
            ->groupBy('date'); // Group timeslots by date

        return view('book', compact('timeslots'));
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
