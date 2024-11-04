<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-900 min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="px-16 py-4">
    <div class="flex justify-between items-center">
        <div class="flex gap-4 cursor-pointer" onclick="window.location.href='/dashboard'">
            <button class="text-gray-900 hover:text-gray-600 font-medium">Log in</button>
        </div>
    </div>
</nav>

<div class="flex-grow flex items-center justify-center flex-col space-y-2 -mt-12">
    <h1 class="text-5xl font-bold text-center">De beste service hebben wij!</h1>
    <p class="text-gray-600 text-lg text-center">Gevestigd in Nederland, repareren wij alles voor u.</p>
    <button onclick="window.location.href='/book'" class="bg-gray-900 text-white py-3 px-8 rounded-full font-medium hover:bg-gray-700 transition duration-300">
        Boek een afspraak
    </button>
</div>


</body>
</html>
