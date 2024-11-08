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
    <!-- Footer -->
<footer class="bg-white border-t border-gray-100 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">U-Need-It</a>
                </div>
                <p class="text-gray-500">Professionele reparaties voor al uw apparaten.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Diensten</h3>
                <ul class="space-y-3">
                    <li><span href="#" class="text-gray-500 hover:text-blue-600 transition-colors">Telefoon Reparatie</span></li>
                    <li><span href="#" class="text-gray-500 hover:text-blue-600 transition-colors">Laptop Reparatie</span></li>
                    <li><span href="#" class="text-gray-500 hover:text-blue-600 transition-colors">Tablet Reparatie</span></li>
                    <li><span href="#" class="text-gray-500 hover:text-blue-600 transition-colors">Game Console Reparatie</span></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Contact</h3>
                <ul class="space-y-3">
                    <li class="text-gray-500">
                        <span class="block">Zuidbaan 514</span>
                        <span class="block">2841 MD Moordrecht</span>
                    </li>
                    <li>
                        <a href="tel:+31612345678" class="text-gray-500 hover:text-blue-600 transition-colors">
                            +31 6 1234 5678
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@u-need-it.nl" class="text-gray-500 hover:text-blue-600 transition-colors">
                            info@uneedit.nl
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Opening Hours -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Openingstijden</h3>
                <ul class="space-y-3 text-gray-500">
                    <li>Maandag - Vrijdag: 09:00 - 18:00</li>
                    <li>Zaterdag: 10:00 - 17:00</li>
                    <li>Zondag: Gesloten</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
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
                    <input type="radio" name="timeslot_id" value="${slot.id}" class="peer sr-only" ${slot.booked ? 'disabled' : ''} required>
                    <div class="p-4 rounded-xl border border-gray-200 cursor-pointer
                         ${slot.booked ? 'bg-gray-100 cursor-not-allowed text-gray-400' : 'peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-blue-300 hover:bg-gray-50'}
                         transition-all">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 ${slot.booked ? 'text-gray-300' : 'text-gray-400 peer-checked:text-blue-500'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium ${slot.booked ? 'text-gray-400' : 'text-gray-900'}">${slot.start_time} - ${slot.end_time}</span>
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
