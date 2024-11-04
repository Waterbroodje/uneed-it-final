<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::where('date', '>=', Carbon::today())
            ->where('booked', false)
            ->where(function($query) {
                $query->where('date', '>', Carbon::today())
                ->orWhere(function($query) {
                    $query->where('date', '=', Carbon::today())
                    ->where('end_time', '>', Carbon::now());
                });
            })
            ->orderBy('date')
            ->orderBy('start_time')
            ->get()
            ->groupBy('date');

        return view('book', compact('timeslots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'timeslot_id' => 'required|exists:timeslots,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'reason' => 'required|string|max:255'
        ], [
            'timeslot_id.required' => 'U moet een tijdslot selecteren.',
            'timeslot_id.exists' => 'Het geselecteerde tijdslot bestaat niet.',
            'name.required' => 'Naam is verplicht.',
            'name.string' => 'Naam moet een geldige tekst zijn.',
            'name.max' => 'Naam mag niet langer zijn dan 255 tekens.',
            'email.required' => 'Email is verplicht.',
            'email.email' => 'Voer een geldig emailadres in.',
            'phone.required' => 'Telefoonnummer is verplicht.',
            'phone.string' => 'Telefoonnummer moet een geldige tekst zijn.',
            'phone.max' => 'Telefoonnummer mag niet langer zijn dan 20 tekens.',
            'reason.required' => 'Reden is verplicht.',
            'reason.string' => 'Reden moet een geldige tekst zijn.',
            'reason.max' => 'Reden mag niet langer zijn dan 255 tekens.',
        ]);

        try {
            $booking = Booking::create($request->all());
            $booking->save();

            $timeslot = $booking->timeslot;
            if ($timeslot->booked) {
                return redirect()->back()->withErrors(['error' => 'Dit tijdslot is al geboekt door iemand anders.']);
            }

            $timeslot->booked = true;
            $timeslot->save();

            return redirect()->route('book.index')->with([
                'success' => 'De reservering is gemaakt! Je hebt een e-mail ontvangen met je bevestiging.',
                'bookingId' => $booking->id
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Er is een probleem opgetreden bij het maken van de reservering. Probeer het opnieuw.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Er is een onverwachte fout opgetreden.']);
        }
    }
}
