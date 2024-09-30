<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-900 min-h-screen flex flex-col items-center justify-center">

<div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">TIMESLOTS</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <label for="timeslot_id" class="block mb-2">Select a Timeslot:</label>
        <select name="timeslot_id" id="timeslot_id" required class="border p-2 mb-4 w-full">
            <option value="">-- Select a Timeslot --</option>
            @foreach($timeslots as $timeslot)
                <option value="{{ $timeslot->id }}">
                    {{ $timeslot->start_time }} - {{ $timeslot->end_time }}
                </option>
            @endforeach
        </select>

        <label for="name" class="block mb-2">Name:</label>
        <input type="text" name="name" id="name" required class="border p-2 mb-4 w-full">

        <label for="email" class="block mb-2">Email:</label>
        <input type="email" name="email" id="email" required class="border p-2 mb-4 w-full">

        <label for="phone" class="block mb-2">Phone:</label>
        <input type="text" name="phone" id="phone" required class="border p-2 mb-4 w-full">

        <label for="reason" class="block mb-2">Reason:</label>
        <input type="text" name="reason" id="reason" required class="border p-2 mb-4 w-full">

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Book Now</button>
    </form>
</div>

</body>
</html>
