<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Need-It - Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fafbff;
        }

        .nav-glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .booking-grid {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 2rem;
        }

        @media (max-width: 1024px) {
            .booking-grid {
                grid-template-columns: 1fr;
            }
        }

        .time-slot {
            transition: all 0.2s ease;
        }

        .time-slot:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Modern Navbar -->
    <nav class="nav-glass fixed top-0 left-0 right-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">U-Need-It</a>
                </div>
                <div class="flex items-center space-x-8">
                    <span class="text-lg font-semibold text-gray-900">Maak een afspraak</span>
                    <div class="h-8 w-px bg-gray-200"></div>
                    <a href="/dashboard" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        @if (\Session::has('success'))
            <!-- Success State -->
            <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm p-8 border border-green-100">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Boeking Bevestigd!</h2>
                    <p class="text-gray-600 mb-4">Uw afspraak is succesvol ingepland</p>
                    <div class="inline-block bg-gray-50 px-4 py-2 rounded-lg">
                        <span class="text-gray-600">Boekingsnummer:</span>
                        <span class="font-semibold text-gray-900">{{ Session::get('bookingId') }}</span>
                    </div>
                </div>
            </div>
        @elseif($errors->any())
            <!-- Error State -->
            <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm p-6 border border-red-100">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Er ging iets mis</h3>
                        <ul class="mt-2 list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <!-- Booking Interface -->
            <div class="booking-grid">
                <!-- Left Sidebar - Date Selection -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 h-fit">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Selecteer een datum</h3>
                    <div class="space-y-3">
                        @foreach($timeslots as $date => $slots)
                            <button onclick="selectDate('{{ $date }}')"
                                    class="date-btn w-full flex items-center justify-between p-4 rounded-xl border-2 border-gray-100 hover:border-blue-100 hover:bg-blue-50 transition-all"
                                    data-date="{{ $date }}">
                                <div class="flex flex-col items-start">
                                    <span class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($date)->format('D') }}
                                    </span>
                                    <span class="text-lg font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($date)->format('d M') }}
                                    </span>
                                </div>
                                <span class="text-sm text-gray-500">
                                    {{ count($slots) }} slots
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Right Content Area -->
                <div class="space-y-8">
                    <form action="{{ route('book.store') }}" method="POST" id="bookingForm" class="space-y-8">
                        @csrf

                        <!-- Time Slots Section -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                Beschikbare tijden voor <span id="selectedDate" class="text-blue-600">vandaag</span>
                            </h3>
                            <div id="timeslotOptions" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                <!-- Timeslots will be populated here -->
                            </div>
                        </div>

                        <!-- Personal Details Section -->
                        <div id="bookingDetails" class="hidden bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Persoonlijke gegevens</h3>
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Naam</label>
                                    <input type="text" name="name" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Telefoon</label>
                                    <input type="tel" name="phone" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Reden voor bezoek</label>
                                    <input type="text" name="reason" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-8">
                                <button type="submit" 
                                        class="w-full bg-blue-600 text-white py-4 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
                                    Afspraak Bevestigen
                                </button>
                                <p class="text-sm text-gray-500 text-center mt-4">
                                    U ontvangt een bevestiging per email na het boeken
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </main>

    <script>
        let timeslots = @json($timeslots);
        
        function selectDate(date) {
            // Update date buttons state
            document.querySelectorAll('.date-btn').forEach(btn => {
                if (btn.dataset.date === date) {
                    btn.classList.add('border-blue-500', 'bg-blue-50');
                } else {
                    btn.classList.remove('border-blue-500', 'bg-blue-50');
                }
            });

            // Update selected date display
            document.getElementById('selectedDate').textContent = new Date(date).toLocaleDateString('nl-NL', {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            });

            // Generate time slots
            let options = timeslots[date].map(slot => `
                <label class="time-slot block">
                    <input type="radio" name="timeslot_id" value="${slot.id}" class="peer sr-only" required>
                    <div class="p-4 rounded-xl border border-gray-200 cursor-pointer
                         peer-checked:border-blue-500 peer-checked:bg-blue-50
                         hover:border-blue-300 hover:bg-gray-50 transition-all">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-gray-400 peer-checked:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium text-gray-900">${slot.start_time} - ${slot.end_time}</span>
                        </div>
                    </div>
                </label>
            `).join('');

            document.getElementById('timeslotOptions').innerHTML = options;
            document.getElementById('bookingDetails').classList.remove('hidden');

            // Show booking form on time slot selection
            document.querySelectorAll('input[name="timeslot_id"]').forEach(input => {
                input.addEventListener('change', () => {
                    document.getElementById('bookingDetails').classList.remove('hidden');
                });
            });
        }

        // Initialize with first date
        window.addEventListener('load', () => {
            const firstDate = Object.keys(timeslots)[0];
            if (firstDate) {
                selectDate(firstDate);
            }
        });
    </script>
</body>
</html>