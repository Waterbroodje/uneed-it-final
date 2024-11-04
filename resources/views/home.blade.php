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
<body class="bg-white text-gray-900 flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="bg-white shadow px-8 md:px-16 py-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4 cursor-pointer">
            <h1 class="text-xl font-bold text-gray-900">U-Need-it</h1>
        </div>
        <div>
            <button class="text-gray-900 hover:text-gray-600 font-medium cursor-pointer" onclick="window.location.href='/dashboard'">Log in</button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="flex-grow flex items-center justify-center flex-col text-center space-y-4 py-20 bg-gray-50">
    <h1 class="text-4xl md:text-5xl font-bold">De beste service hebben wij!</h1>
    <p class="text-gray-600 text-lg md:text-xl">Gevestigd in Rotterdam, repareren wij alles voor u.</p>
    <button onclick="window.location.href='/book'" class="bg-gray-900 text-white py-3 px-8 rounded-full font-medium hover:bg-gray-700 transition duration-300">
        Boek een afspraak
    </button>
</div>

<!-- Services Section -->
<div class="px-8 md:px-16 py-16 bg-white">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Onze Diensten</h2>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <h3 class="text-2xl font-semibold mb-4">Telefoon Reparaties</h3>
            <p class="text-gray-600">Van schermvervangingen tot batterijproblemen, wij repareren uw telefoon snel en professioneel.</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <h3 class="text-2xl font-semibold mb-4">Laptop Reparaties</h3>
            <p class="text-gray-600">Hardware en software reparaties voor alle soorten laptops en notebooks.</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <h3 class="text-2xl font-semibold mb-4">Tablet en iPad Reparaties</h3>
            <p class="text-gray-600">Wij herstellen uw tablet zodat deze weer als nieuw functioneert.</p>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="bg-gray-50 py-16 px-8 md:px-16">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Wat Klanten Zeggen</h2>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <p class="text-gray-700 italic">"Uitstekende service! Mijn telefoon was binnen een uur gerepareerd."</p>
            <p class="text-gray-600 text-right mt-4">- Anna Jansen</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <p class="text-gray-700 italic">"Professioneel en betrouwbaar. Mijn laptop werkt weer als een zonnetje!"</p>
            <p class="text-gray-600 text-right mt-4">- Mark de Vries</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <p class="text-gray-700 italic">"Zeer tevreden over de snelle service en de klantvriendelijkheid."</p>
            <p class="text-gray-600 text-right mt-4">- Sophie Bakker</p>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="px-8 md:px-16 py-16 bg-white">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Contacteer Ons</h2>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
        <div>
            <h3 class="text-2xl font-semibold mb-4">Adres</h3>
            <p class="text-gray-600">123 u-need-it straat<br>Nederland, Rotterdam</p>
        </div>
        <div>
            <h3 class="text-2xl font-semibold mb-4">Telefoon</h3>
            <p class="text-gray-600">+31 20 123 4567</p>
        </div>
        <div>
            <h3 class="text-2xl font-semibold mb-4">E-mail</h3>
            <p class="text-gray-600">info@u-need-it.nl</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-8 md:px-16">
        <p class="text-center md:text-left mb-4 md:mb-0">&copy; 2024 U-Need-it. Alle rechten voorbehouden.</p>
        <div class="flex gap-4">
            <a href="#" class="hover:text-gray-400">Privacybeleid</a>
            <a href="#" class="hover:text-gray-400">Voorwaarden</a>
        </div>
    </div>
</footer>
</body>
</html>
