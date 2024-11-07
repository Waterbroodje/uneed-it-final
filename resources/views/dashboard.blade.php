<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Admin Dashboard') }}
            </h2>
            <button
                onclick="window.location.href = '/book'"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nieuwe booking
            </button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Afspraken vandaag</p>
                            <h4 class="text-2xl font-bold text-gray-900 mt-1">{{ $currentAppointments->total() }}</h4>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Opkomende afspraken</p>
                            <h4 class="text-2xl font-bold text-gray-900 mt-1">{{ $upcomingAppointments->total() }}</h4>
                        </div>
                        <div class="bg-indigo-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Beschikbare sloten</p>
                            <h4 class="text-2xl font-bold text-gray-900 mt-1">{{ $availableTimeslots->total() }}</h4>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Appointments -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Huidige afspraak</h3>
                </div>
                <div class="p-6">
                    @foreach ($currentAppointments as $appointment)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="bg-blue-50 p-3 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $appointment->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $appointment->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right">
                                    <p class="font-medium text-gray-900">
                                        {{ $appointment->timeslot->start_time }} -
                                        {{ $appointment->timeslot->end_time }}</p>
                                    <p class="text-sm text-gray-500">Vandaag</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Opkomende afspraken</h3>
                </div>
                <div class="p-6">
                    @if ($upcomingAppointments->isEmpty())
                        <div class="text-center py-6">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-500">Geen opkomende afspraken</p>
                        </div>
                    @else
                        <div class="divide-y divide-gray-100">
                            @foreach ($upcomingAppointments as $appointment)
                                <div class="py-4 flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-indigo-50 p-3 rounded-lg">
                                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $appointment->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $appointment->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div class="text-right">
                                            <p class="font-medium text-gray-900">
                                                {{ $appointment->timeslot->start_time }} -
                                                {{ $appointment->timeslot->end_time }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ $appointment->timeslot->formatted_date }}</p>
                                        </div>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($upcomingAppointments->hasPages())
                            <div class="mt-6 border-t border-gray-100 pt-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        Showing {{ $upcomingAppointments->firstItem() }} to
                                        {{ $upcomingAppointments->lastItem() }}
                                        of {{ $upcomingAppointments->total() }} bookings
                                    </div>
                                    {{ $upcomingAppointments->links() }}
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Available Timeslots -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Beschikbare tijdsloten</h3>
                    <button
                        class="text-sm px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Nieuw tijdslot
                    </button>
                </div>
                <div class="p-6">
                    @if ($availableTimeslots->isEmpty())
                        <div class="text-center py-8">
                            <div
                                class="bg-gray-50 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 font-medium">Geen beschikbare tijdsloten</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($availableTimeslots as $timeslot)
                                <div
                                    class="group hover:bg-blue-50 p-4 bg-gray-50 rounded-lg flex items-center justify-between transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-white p-2 rounded-lg group-hover:bg-blue-100 transition-colors">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="font-medium text-gray-900">{{ $timeslot->start_time }} -
                                                {{ $timeslot->end_time }}</span>
                                            <p class="text-sm text-gray-500">{{ $timeslot->formatted_date }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full font-medium">Beschikbaar</span>
                                        <button class="text-gray-400 hover:text-gray-600 p-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($availableTimeslots->hasPages())
                            <div class="mt-6 pt-6 border-t border-gray-100 flex items-center justify-between">
                                <button onclick="window.location.href='{{ $availableTimeslots->previousPageUrl() }}'"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 {{ $availableTimeslots->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ $availableTimeslots->onFirstPage() ? 'disabled' : '' }}>
                                    Vorige
                                </button>
                                <span class="text-sm text-gray-600">
                                    Pagina {{ $availableTimeslots->currentPage() }} van
                                    {{ $availableTimeslots->lastPage() }}
                                </span>
                                <button onclick="window.location.href='{{ $availableTimeslots->nextPageUrl() }}'"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 {{ !$availableTimeslots->hasMorePages() ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ !$availableTimeslots->hasMorePages() ? 'disabled' : '' }}>
                                    Volgende
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
