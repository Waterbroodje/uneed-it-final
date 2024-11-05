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
                        <span class="block">Hoofdstraat 123</span>
                        <span class="block">3000 AA Rotterdam</span>
                    </li>
                    <li>
                        <a href="tel:+31612345678" class="text-gray-500 hover:text-blue-600 transition-colors">
                            +31 6 1234 5678
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@u-need-it.nl" class="text-gray-500 hover:text-blue-600 transition-colors">
                            info@u-need-it.nl
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
</body>
</html>
