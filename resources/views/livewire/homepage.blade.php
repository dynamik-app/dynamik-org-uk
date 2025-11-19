@push('meta')
    <meta name="description" content="DYNAMIK provides electrical installations, industrial automation, fire and emergency response systems, security systems, CCTV and access control, networking, and hardware and software solutions for businesses across Birmingham and the West Midlands, United Kingdom." />
    <meta name="keywords" content="electrical installations Birmingham, industrial automation West Midlands, fire and emergency services Birmingham, security systems West Midlands, CCTV access control Birmingham, networking solutions West Midlands, hardware software support Birmingham" />

    @php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => config('app.name', 'DYNAMIK'),
            'url' => url('/'),
            'image' => url('/logo/dynamik-logo-transparent.png'),
            'description' => 'Electrical installations, industrial automation, fire and emergency services, security systems, CCTV and access control, networking, and hardware and software solutions for organisations across Birmingham and the West Midlands.',
            'telephone' => '(123) 456-7890',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Birmingham',
                'addressRegion' => 'West Midlands',
                'addressCountry' => 'United Kingdom',
            ],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Birmingham'],
                ['@type' => 'AdministrativeArea', 'name' => 'West Midlands'],
            ],
            'makesOffer' => [
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Electrical installations for commercial and industrial sites']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Industrial automation design and maintenance']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Fire and emergency systems installation and servicing']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Security systems with CCTV and access control']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Networking hardware and software support']],
            ],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

<div class="antialiased bg-gray-50 text-gray-900 font-sans">

    <!-- Hero Section: Dynamic, full-screen banner -->
    <section class="w-full h-[80vh] md:h-[95vh] relative text-white flex flex-col items-center justify-end text-center p-8 overflow-hidden">
        <!-- Background Image with Dark Overlay -->
        <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('//dynamik.org.uk/images/service-engineer-working-inspection-installation.jpg');"></div>
        <div class="absolute inset-0 z-10 bg-gradient-to-t from-gray-900 to-transparent"></div>

        <div class="relative z-20 max-w-4xl mx-auto mb-16 md:mb-24">
            <img src="/logo/dynamik-logo-transparent.png" alt="DYNAMIK Logo" class="h-auto w-auto">
        </div>
    </section>

    <!-- Local Impact Section -->
    <section class="w-full py-16 md:py-20 px-4 bg-white text-gray-900">
        <div class="mx-auto max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-10 items-center">
            <div class="lg:col-span-2 space-y-6">
                <p class="inline-flex items-center text-sm uppercase tracking-[0.2em] text-blue-700 bg-blue-50 px-4 py-2 rounded-full w-fit">Serving Birmingham & the West Midlands</p>
                <h1 class="text-4xl md:text-5xl font-semibold leading-tight">Electrical specialists for the businesses that power the West Midlands.</h1>
                <p class="text-lg text-gray-700">We engineer and maintain resilient infrastructure for hospitality venues, NHS sites, manufacturers, logistics hubs, and professional offices across Birmingham, Wolverhampton, Coventry, and the wider West Midlands.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="/contact" class="px-6 py-3 bg-blue-600 text-white rounded-full text-base font-semibold hover:bg-blue-700 transition-colors duration-200">Book a site visit</a>
                    <a href="/solutions" class="px-6 py-3 bg-white border border-gray-300 text-gray-900 rounded-full text-base font-semibold hover:border-gray-400 transition-colors duration-200">View project capabilities</a>
                </div>
            </div>
            <div class="bg-gray-100 rounded-2xl p-8 shadow-sm space-y-4">
                <h2 class="text-2xl font-semibold text-gray-900">Why local teams choose DYNAMIK</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span class="text-blue-600">•</span> Rapid response electricians for critical facilities and scheduled upgrades.</li>
                    <li class="flex items-start gap-3"><span class="text-blue-600">•</span> Compliance-first approach aligned to UK safety standards and insurance requirements.</li>
                    <li class="flex items-start gap-3"><span class="text-blue-600">•</span> Integrated support that spans electrical, security, networking, and automation.</li>
                </ul>
                <p class="text-sm text-gray-600">From Birmingham city centre to Dudley, Solihull, and the Black Country, we deliver reliable, well-documented installations that keep you operating.</p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="w-full py-16 md:py-24 px-4 bg-gray-50 text-gray-900">
        <div class="mx-auto max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-4xl md:text-5xl font-semibold tracking-tight mb-4">Electrical services for West Midlands businesses</h2>
                <p class="text-lg text-gray-700">From new installations to always-on monitoring, we combine electrical engineering, automation, safety, and IT to keep your organisation connected and compliant.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">Electrical installations</h3>
                    <p class="text-gray-700 mb-4">Full design and fit-out for commercial, industrial, and hospitality sites, including board upgrades, distribution, and energy-efficient lighting.</p>
                    <p class="text-sm text-blue-700 font-semibold">Birmingham, Wolverhampton, Coventry, Solihull.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">Industrial automation</h3>
                    <p class="text-gray-700 mb-4">PLC programming, control panels, and instrumentation that increase uptime and output across manufacturing lines and process plants.</p>
                    <p class="text-sm text-blue-700 font-semibold">24/7 support for production-critical systems.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">Fire & emergency services</h3>
                    <p class="text-gray-700 mb-4">Design, installation, and maintenance of fire alarms, emergency lighting, and evacuation systems aligned to UK regulations.</p>
                    <p class="text-sm text-blue-700 font-semibold">Documentation for audits and insurance checks.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">Security systems</h3>
                    <p class="text-gray-700 mb-4">Intruder detection, perimeter protection, and monitored solutions that safeguard warehouses, retail, and multi-site estates.</p>
                    <p class="text-sm text-blue-700 font-semibold">Engineered for reliability and remote management.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">CCTV & access control</h3>
                    <p class="text-gray-700 mb-4">High-definition CCTV, ANPR, door entry, and credential management to secure staff, guests, and assets across your premises.</p>
                    <p class="text-sm text-blue-700 font-semibold">Integrations with existing IT and security policies.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold mb-3">Networking, hardware & software</h3>
                    <p class="text-gray-700 mb-4">Structured cabling, Wi-Fi design, switch and router deployments, plus endpoint and server support for resilient connectivity.</p>
                    <p class="text-sm text-blue-700 font-semibold">Optimised for multi-site and remote teams.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Regional credibility & reassurance -->
    <section class="w-full py-16 px-4 bg-white text-gray-900">
        <div class="mx-auto max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
            <div class="space-y-4">
                <p class="text-sm uppercase tracking-[0.2em] text-blue-700">West Midlands ready</p>
                <h2 class="text-3xl md:text-4xl font-semibold leading-tight">Built for local compliance and continuity.</h2>
                <p class="text-lg text-gray-700">Our engineers are versed in UK workplace regulations, insurance requirements, and landlord approvals, providing reports and certification that keep Birmingham and West Midlands sites audit-ready.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100 space-y-4">
                <h3 class="text-xl font-semibold">Planned & reactive cover</h3>
                <p class="text-gray-700">Scheduled maintenance programmes, PAT testing, and rapid fault response for schools, healthcare, manufacturing, and hospitality venues.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100 space-y-4">
                <h3 class="text-xl font-semibold">Connected from cabling to cloud</h3>
                <p class="text-gray-700">Integrated electrical, CCTV, access control, and network design so your critical systems communicate securely across every site.</p>
            </div>
        </div>
        <div class="mx-auto max-w-6xl mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 text-gray-800">
            <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">24/7</div>
                <div>
                    <p class="font-semibold">Emergency cover</p>
                    <p class="text-sm text-gray-600">Rapid call-outs for critical faults and safety systems.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">ISO</div>
                <div>
                    <p class="font-semibold">Standards aligned</p>
                    <p class="text-sm text-gray-600">Work delivered to UK standards with clear documentation.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">360°</div>
                <div>
                    <p class="font-semibold">Full lifecycle support</p>
                    <p class="text-sm text-gray-600">Design, installation, monitoring, and upgrades under one team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section: Large product tiles -->
    <section class="w-full py-16 md:py-24 px-4 bg-black text-white">
        <div class="mx-auto max-w-7xl">
            <h2 class="text-center text-4xl md:text-5xl font-semibold tracking-tight mb-16">
                Our Solutions
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 lg:gap-16">
                @forelse($solutions as $solution)
                    <!-- Solution Card -->
                    <div class="relative bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col p-8 transition transform hover:scale-105 duration-300">
                        <h3 class="text-3xl font-bold tracking-tight mb-2">{{ $solution->name }}</h3>
                        <p class="text-gray-400 mb-6">
                            {{ $solution->description }}
                        </p>
                        @if($solution->slug)
                            <a href="{{ route('solutions.show', $solution->slug) }}" class="mt-auto text-blue-400 hover:text-blue-200 transition-colors duration-200">
                                Learn more ›
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="text-center col-span-3 text-gray-400">New solutions will be published soon.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Final CTA Banner -->
    <section class="w-full py-24 bg-white text-gray-900 text-center">
        <h2 class="text-4xl md:text-5xl font-semibold tracking-tight mb-4">
            Quality. Guaranteed.
        </h2>
        <a href="/contact" class="inline-block px-10 py-4 text-lg font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
            Request an Estimate
        </a>
    </section>

    <!-- Footer Section -->
    <footer class="w-full py-12 px-4 bg-gray-900 text-gray-300">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">DYNAMIK - The Power to Connect</h3>
                    <p class="text-sm">
                        Providing innovative electrical solutions with a commitment to quality, safety, and customer satisfaction.
                    </p>
                </div>
                <!-- Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-sm hover:text-white transition-colors duration-200">Home</a></li>
                        <li><a href="/solutions" class="text-sm hover:text-white transition-colors duration-200">Solutions</a></li>
                        <li><a href="/shop" class="text-sm hover:text-white transition-colors duration-200">Shop</a></li>
                        <li><a href="/contact" class="text-sm hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Contact</h3>
                    <p class="text-sm">
                        Email: info@dynamik.org.uk
                    </p>
                    <p class="text-sm">
                        Phone: (123) 456-7890
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm">
                &copy; 2025 DYNAMIK. All rights reserved.
            </div>
        </div>
    </footer>

</div>
