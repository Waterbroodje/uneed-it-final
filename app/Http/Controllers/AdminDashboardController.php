<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Your existing index method code remains the same
        $currentAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '<=', Carbon::now()->format('H:i:s'))
                ->where('end_time', '>=', Carbon::now()->format('H:i:s'));
        })->paginate(5, ['*'], 'current_page');

        $upcomingAppointments = Booking::whereHas('timeslot', function ($query) {
            $query->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->where('start_time', '>', Carbon::now()->format('H:i:s'));
        })->paginate(5, ['*'], 'upcoming_page');

        $availableTimeslots = Timeslot::where('booked', false)
            ->where('date', '>=', Carbon::today()->format('Y-m-d'))
            ->orderBy('date')
            ->orderBy('start_time')
            ->paginate(9, ['*'], 'available_page');

        return view('dashboard', compact('currentAppointments', 'upcomingAppointments', 'availableTimeslots'));
    }

    // Add these new methods
    public function createTimeslot()
    {
        return view('timeslot.create');
    }

    public function storeTimeslot(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        Timeslot::create([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'booked' => false,
        ]);

        return redirect()->route('dashboard')->with('success', 'Tijdslot succesvol aangemaakt');
    }

    public function destroyTimeslot(Timeslot $timeslot)
    {
        try {
            if ($timeslot->booked) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kan geen geboekt tijdslot verwijderen'
                ], 400);
            }

            $timeslot->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Er is een fout opgetreden bij het verwijderen'
            ], 500);
        }
    }

    public function destroyBooking(Booking $booking)
    {
        try {
            $timeslot = $booking->timeslot;
            $timeslot->booked = false;
            $timeslot->save();

            $booking->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Er is een fout opgetreden bij het verwijderen'
            ], 500);
        }
    }
}
