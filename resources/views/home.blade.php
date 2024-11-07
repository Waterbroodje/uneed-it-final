<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Need-It - Professional Repair Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .nav-glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="nav-glass fixed w-full z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <span class="text-xl font-bold text-gray-900">U-Need-It</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="#services" class="text-gray-600 hover:text-gray-900">Services</a>
                    <a href="#contact" class="text-gray-600 hover:text-gray-900">Contact</a>
                    <a href="/dashboard" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Log in
                    </a>
                    <a href="/book" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Boek nu
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Professionele Reparatie Service in Rotterdam
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Van smartphones tot laptops - wij repareren uw apparaten snel en vakkundig.
                </p>
                <div class="flex gap-4 justify-center">
                    <a href="/book" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Maak een afspraak
                    </a>
                    <a href="#services" class="text-gray-700 px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Meer info
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Onze Diensten</h2>
                <p class="text-gray-600">Wij bieden professionele reparaties voor al uw elektronische apparaten.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Telefoon Reparaties</h3>
                    <p class="text-gray-600 mb-6">Van schermvervangingen tot batterijproblemen, wij repareren uw telefoon snel en professioneel.</p>
                    <a href="/book" class="text-blue-600 font-medium flex items-center gap-2 hover:text-blue-700">
                        Plan reparatie
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Laptop Reparaties</h3>
                    <p class="text-gray-600 mb-6">Hardware en software reparaties voor alle soorten laptops en notebooks.</p>
                    <a href="/book" class="text-blue-600 font-medium flex items-center gap-2 hover:text-blue-700">
                        Plan reparatie
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tablet Reparaties</h3>
                    <p class="text-gray-600 mb-6">Wij herstellen uw tablet zodat deze weer als nieuw functioneert.</p>
                    <a href="/book" class="text-blue-600 font-medium flex items-center gap-2 hover:text-blue-700">
                        Plan reparatie
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Wat Klanten Zeggen</h2>
                <p class="text-gray-600">Ontdek waarom klanten voor onze service kiezen.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="bg-blue-50 w-12 h-12 rounded-full flex items-center justify-center">
                            <span class="text-xl font-semibold text-blue-600">A</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Anna Jansen</h4>
                            <p class="text-sm text-gray-500">iPhone Reparatie</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Uitstekende service! Mijn telefoon was binnen een uur gerepareerd."</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="bg-blue-50 w-12 h-12 rounded-full flex items-center justify-center">
                            <span class="text-xl font-semibold text-blue-600">M</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Mark de Vries</h4>
                            <p class="text-sm text-gray-500">Laptop Reparatie</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Professioneel en betrouwbaar. Mijn laptop werkt weer als een zonnetje!"</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="bg-blue-50 w-12 h-12 rounded-full flex items-center justify-center">
                            <span class="text-xl font-semibold text-blue-600">S</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sophie Bakker</h4>
                            <p class="text-sm text-gray-500">iPad Reparatie</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Zeer tevreden over de snelle service en de klantvriendelijkheid."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="py-20 bg-white">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Contact</h2>
            <p class="text-gray-600">Neem contact met ons op voor al uw vragen.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Bezoek ons</h3>
                    <p class="text-gray-600">
                        Hoofdstraat 123<br>
                        3000 AA Rotterdam<br>
                        Nederland
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Bel ons</h3>
                    <p class="text-gray-600 mb-3">Maandag - Zaterdag 9:00 - 18:00</p>
                    <a href="tel:+31201234567" class="text-blue-600 font-medium hover:text-blue-700">
                        +31 20 123 4567
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mail ons</h3>
                    <p class="text-gray-600 mb-3">We reageren binnen 24 uur</p>
                    <a href="mailto:info@u-need-it.nl" class="text-blue-600 font-medium hover:text-blue-700">
                        info@u-need-it.nl
                    </a>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>
