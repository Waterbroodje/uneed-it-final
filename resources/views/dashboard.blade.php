<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-bold">Current Appointments</h3>
                    @if($currentAppointments->isEmpty())
                        <p>No current appointments.</p>
                    @else
                        <ul>
                            @foreach($currentAppointments as $appointment)
                                <li>{{ $appointment->name }} ({{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }})</li>
                            @endforeach
                        </ul>
                    @endif

                    <h3 class="text-lg font-bold mt-6">Upcoming Appointments</h3>
                    @if($upcomingAppointments->isEmpty())
                        <p>No upcoming appointments.</p>
                    @else
                        <ul>
                            @foreach($upcomingAppointments as $appointment)
                                <li>{{ $appointment->name }} ({{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }})</li>
                            @endforeach
                        </ul>
                    @endif

                    <h3 class="text-lg font-bold mt-6">Available Timeslots</h3>
                    @if($availableTimeslots->isEmpty())
                        <p>All timeslots are booked.</p>
                    @else
                        <ul>
                            @foreach($availableTimeslots as $timeslot)
                                <li>{{ $timeslot->start_time }} - {{ $timeslot->end_time }} (Available)</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
