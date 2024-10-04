<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak een afspraak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* Hide scrollbar for horizontal scrolling */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-semibold mb-6 text-center">Maak een afspraak</h2>

    <!-- Date Selector Section -->
    <div class="w-full overflow-x-auto no-scrollbar mb-6">
        <ul class="flex space-x-3">
            @foreach($timeslots as $date => $slots)
                <li>
                    <button
                        class="px-4 py-2 rounded-full border border-gray-300 text-sm font-medium text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300 transition"
                        onclick="selectDate('{{ $date }}')">
                        {{ \Carbon\Carbon::parse($date)->format('d M') }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Timeslot Selector Section -->
    <div class="w-full">
        <h2 class="text-xl font-medium mb-4 text-center">Beschikbare tijden voor <span id="selectedDate" class="text-gray-600">Selecteer een datum</span></h2>

        <form action="{{ route('book.store') }}" method="POST" id="bookingForm" class="space-y-4">
            @csrf

            <!-- Timeslot options will be dynamically loaded here -->
            <div id="timeslotOptions" class="grid grid-cols-1 gap-4 text-center"></div>

            <!-- Booking Form -->
            <div id="bookingDetails" class="hidden mt-6">
                <div class="space-y-4">
                    <input type="text" name="name" id="name" placeholder="Name" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <input type="email" name="email" id="email" placeholder="Email" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <input type="text" name="phone" id="phone" placeholder="Phone" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <input type="text" name="reason" id="reason" placeholder="Reason" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg shadow-md hover:bg-blue-600 transition">Book Now</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let timeslots = @json($timeslots);

    function selectDate(date) {
        document.getElementById('selectedDate').textContent = new Date(date).toLocaleDateString();

        // Generate timeslot options dynamically
        let options = timeslots[date].map(slot => `
            <label class="block bg-gray-100 p-4 rounded-lg shadow-sm hover:bg-blue-50">
                <input type="radio" name="timeslot_id" value="${slot.id}" class="mr-2" required>
                <span class="font-medium">${slot.start_time} - ${slot.end_time}</span>
            </label>
        `).join('');

        document.getElementById('timeslotOptions').innerHTML = options;
        document.getElementById('bookingDetails').classList.remove('hidden');
    }
</script>

</body>
</html>
