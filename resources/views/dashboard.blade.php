<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Need-It - Premium Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f8ff 0%, #f1f5ff 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
        }

        .time-slot {
            transition: all 0.3s ease;
        }

        .time-slot:hover {
            transform: translateY(-2px);
        }

        .date-pill {
            transition: all 0.3s ease;
        }

        .date-pill:hover:not(.active) {
            background: rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .date-pill.active {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        @keyframes fadeUpIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUpIn 0.5s ease-out forwards;
        }

        .input-focus-effect {
            transition: all 0.3s ease;
        }

        .input-focus-effect:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .success-gradient {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
        }

        .premium-button {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }

        .premium-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-0">
    <div class="max-w-5xl mx-auto my-8 md:my-12">
        @if (\Session::has('success'))
            <div class="glass-card rounded-2xl p-8 animate-fade-up">
                <div class="success-gradient w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="text-center space-y-4">
                    <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-500 to-emerald-600">
                        Boeking Bevestigd
                    </h2>
                    <div class="text-gray-600 text-lg">
                        Uw afspraak is succesvol ingepland
                    </div>
                    <div class="inline-block px-6 py-3 rounded-xl bg-emerald-50 text-emerald-700">
                        Boekingsnummer: <span class="font-semibold">{{ Session::get('bookingId') }}</span>
                    </div>
                </div>
            </div>
        @elseif($errors->any())
            <div class="glass-card rounded-2xl p-6 border-l-4 border-red-500 animate-fade-up">
                <div class="flex items-start space-x-4">
                    <div class="bg-red-100 rounded-full p-3">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Fout bij het boeken</h3>
                        <ul class="space-y-2">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div class="glass-card rounded-2xl overflow-hidden">
                <!-- Header Section -->
                <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 p-8 md:p-12">
                    <div class="relative z-10">
                        <h1 class="text-3xl md:text-4xl font-bold text-white text-center mb-4">
                            Plan uw afspraak
                        </h1>
                        <p class="text-blue-100 text-center max-w-2xl mx-auto">
                            Kies een datum en tijd die u het beste uitkomt
                        </p>
                    </div>
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z\" fill=\"rgba(255,255,255,0.07)\"%3E%3C/path%3E%3C/svg%3E')] opacity-20"></div>
                </div>

                <!-- Booking Content -->
                <div class="p-8">
                    <!-- Date Selection -->
                    <div class="mb-12">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Selecteer een datum</h3>
                        <div class="flex overflow-x-auto pb-4 -mx-2 scrollbar-hide">
                            <div class="flex space-x-4 px-2 min-w-max">
                                @foreach($timeslots as $date => $slots)
                                    <button onclick="selectDate('{{ $date }}')" 
                                            class="date-pill p-4 rounded-xl flex flex-col items-center min-w-[100px] transition-all"
                                            data-date="{{ $date }}">
                                        <span class="text-sm font-medium opacity-75">
                                            {{ \Carbon\Carbon::parse($date)->format('D') }}
                                        </span>
                                        <span class="text-2xl font-bold my-1">
                                            {{ \Carbon\Carbon::parse($date)->format('d') }}
                                        </span>
                                        <span class="text-sm">
                                            {{ \Carbon\Carbon::parse($date)->format('M') }}
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('book.store') }}" method="POST" id="bookingForm">
                        @csrf
                        
                        <!-- Time Slots -->
                        <div class="mb-12">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">
                                Beschikbare tijden voor <span id="selectedDate" class="text-blue-600 font-semibold"></span>
                            </h3>
                            <div id="timeslotOptions" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <!-- Timeslots will be populated here -->
                            </div>
                        </div>

                        <!-- Booking Details -->
                        <div id="bookingDetails" class="hidden animate-fade-up">
                            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Uw gegevens</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Naam</label>
                                        <input type="text" name="name" required
                                               class="input-focus-effect w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" required
                                               class="input-focus-effect w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Telefoon</label>
                                        <input type="tel" name="phone" required
                                               class="input-focus-effect w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Reden voor bezoek</label>
                                        <input type="text" name="reason" required
                                               class="input-focus-effect w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="premium-button w-full text-white py-4 px-8 rounded-xl font-semibold text-lg">
                                Bevestig Afspraak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <script>
        let timeslots = @json($timeslots);
        
        function selectDate(date) {
            // Update selected date display with sophisticated formatting
            const dateObj = new Date(date);
            const formatter = new Intl.DateTimeFormat('nl-NL', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            document.getElementById('selectedDate').textContent = formatter.format(dateObj);

            // Update active state of date pills
            document.querySelectorAll('.date-pill').forEach(btn => {
                if (btn.dataset.date === date) {
                    btn.classList.add('active', 'text-white');
                } else {
                    btn.classList.remove('active', 'text-white');
                }
            });

            // Generate enhanced timeslot options
            let options = timeslots[date].map(slot => `
                <label class="time-slot block cursor-pointer">
                    <input type="radio" name="timeslot_id" value="${slot.id}" class="sr-only peer" required>
                    <div class="p-4 rounded-xl border-2 border-gray-200 bg-white
                         peer-checked:border-blue-500 peer-checked:bg-blue-50 
                         hover:border-blue-200 transition-all duration-300">
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

            // Add smooth reveal effect for booking form
            const inputs = document.querySelectorAll('input[name="timeslot_id"]');
            inputs.forEach(input => {
                input.addEventListener('change', () => {
                    const bookingDetails = document.getElementById('bookingDetails');
                    if (bookingDetails.classList.contains('hidden')) {
                        bookingDetails.classList.remove('hidden');
                        bookingDetails.classList.add('animate-fade-up');
                    }
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