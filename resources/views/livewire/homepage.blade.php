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
    <section class="relative w-full py-20 md:py-24 px-4 overflow-hidden bg-gradient-to-br from-gray-900 via-slate-900 to-blue-900 text-white">
        <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.35),_transparent_45%),_radial-gradient(circle_at_bottom,_rgba(14,165,233,0.35),_transparent_35%)]"></div>
        <div class="relative mx-auto max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-7 text-center lg:text-left">
                <p class="inline-flex items-center justify-center text-xs md:text-sm uppercase tracking-[0.25em] text-blue-100 bg-white/10 backdrop-blur px-5 py-2 rounded-full w-fit mx-auto lg:mx-0">Serving Birmingham & the West Midlands</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold leading-tight">Electrical specialists powering the West Midlands.</h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto lg:mx-0">We engineer and maintain resilient infrastructure for hospitality venues, NHS sites, manufacturers, logistics hubs, and professional offices across Birmingham, Wolverhampton, Coventry, and the wider West Midlands.</p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                    <a href="/contact" class="px-7 py-3 bg-blue-500 text-white rounded-full text-base font-semibold hover:bg-blue-400 transition-colors duration-200 shadow-lg shadow-blue-500/30">Book a site visit</a>
                    <a href="/solutions" class="px-7 py-3 bg-white/10 border border-white/20 text-white rounded-full text-base font-semibold hover:bg-white/15 transition-colors duration-200">View project capabilities</a>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur rounded-3xl p-10 shadow-2xl space-y-6 border border-white/10">
                <div class="flex items-center gap-3 text-blue-100 uppercase tracking-[0.2em] text-sm">
                    <span class="h-10 w-10 flex items-center justify-center rounded-full bg-white/15 font-semibold">UK</span>
                    <span>Trusted regional partner</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-semibold">Why local teams choose DYNAMIK</h2>
                <ul class="space-y-4 text-gray-100 text-base md:text-lg">
                    <li class="flex items-start gap-3"><span class="text-blue-300">•</span> Rapid response electricians for critical facilities and scheduled upgrades.</li>
                    <li class="flex items-start gap-3"><span class="text-blue-300">•</span> Compliance-first approach aligned to UK safety standards and insurance requirements.</li>
                    <li class="flex items-start gap-3"><span class="text-blue-300">•</span> Integrated support that spans electrical, security, networking, and automation.</li>
                </ul>
                <p class="text-sm md:text-base text-gray-200">From Birmingham city centre to Dudley, Solihull, and the Black Country, we deliver reliable, well-documented installations that keep you operating.</p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="relative w-full py-20 md:py-28 px-4 bg-white text-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-50 via-white to-gray-50"></div>
        <div class="absolute inset-x-0 top-10 h-64 bg-[radial-gradient(circle,_rgba(59,130,246,0.12)_0,_transparent_50%)]"></div>
        <div class="relative mx-auto max-w-7xl space-y-14">
            <div class="text-center max-w-4xl mx-auto space-y-5">
                <p class="text-xs md:text-sm uppercase tracking-[0.2em] text-blue-600">Our core capability suite</p>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight">Electrical services built for presentation-worthy spaces.</h2>
                <p class="text-lg md:text-xl text-gray-700">From new installations to always-on monitoring, we combine electrical engineering, automation, safety, and IT to keep your organisation connected and compliant.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-blue-50 shadow-xl border border-blue-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_30%_20%,_rgba(59,130,246,0.25),_transparent_40%),_radial-gradient(circle_at_80%_80%,_rgba(14,165,233,0.25),_transparent_35%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">Electrical installations</h3>
                        <p class="text-gray-700">Full design and fit-out for commercial, industrial, and hospitality sites, including board upgrades, distribution, and energy-efficient lighting.</p>
                        <p class="text-sm text-blue-700 font-semibold">Birmingham, Wolverhampton, Coventry, Solihull.</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-indigo-50 shadow-xl border border-indigo-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_20%_10%,_rgba(99,102,241,0.3),_transparent_40%),_radial-gradient(circle_at_70%_70%,_rgba(59,130,246,0.25),_transparent_35%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">Industrial automation</h3>
                        <p class="text-gray-700">PLC programming, control panels, and instrumentation that increase uptime and output across manufacturing lines and process plants.</p>
                        <p class="text-sm text-indigo-700 font-semibold">24/7 support for production-critical systems.</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-amber-50 shadow-xl border border-amber-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_25%_25%,_rgba(251,191,36,0.3),_transparent_45%),_radial-gradient(circle_at_80%_70%,_rgba(249,115,22,0.2),_transparent_40%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">Fire & emergency services</h3>
                        <p class="text-gray-700">Design, installation, and maintenance of fire alarms, emergency lighting, and evacuation systems aligned to UK regulations.</p>
                        <p class="text-sm text-amber-700 font-semibold">Documentation for audits and insurance checks.</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-slate-50 shadow-xl border border-slate-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_30%_30%,_rgba(59,130,246,0.2),_transparent_50%),_radial-gradient(circle_at_80%_80%,_rgba(15,23,42,0.2),_transparent_40%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">Security systems</h3>
                        <p class="text-gray-700">Intruder detection, perimeter protection, and monitored solutions that safeguard warehouses, retail, and multi-site estates.</p>
                        <p class="text-sm text-slate-800 font-semibold">Engineered for reliability and remote management.</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-cyan-50 shadow-xl border border-cyan-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_20%_20%,_rgba(6,182,212,0.25),_transparent_45%),_radial-gradient(circle_at_70%_70%,_rgba(14,116,144,0.2),_transparent_45%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">CCTV & access control</h3>
                        <p class="text-gray-700">High-definition CCTV, ANPR, door entry, and credential management to secure staff, guests, and assets across your premises.</p>
                        <p class="text-sm text-cyan-800 font-semibold">Integrations with existing IT and security policies.</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-white to-emerald-50 shadow-xl border border-emerald-100/60">
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_25%_30%,_rgba(16,185,129,0.25),_transparent_45%),_radial-gradient(circle_at_80%_70%,_rgba(5,150,105,0.2),_transparent_45%)]"></div>
                    <div class="relative space-y-3">
                        <h3 class="text-2xl md:text-3xl font-bold">Networking, hardware & software</h3>
                        <p class="text-gray-700">Structured cabling, Wi-Fi design, switch and router deployments, plus endpoint and server support for resilient connectivity.</p>
                        <p class="text-sm text-emerald-800 font-semibold">Optimised for multi-site and remote teams.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Regional credibility & reassurance -->
    <section class="w-full py-20 md:py-24 px-4 bg-gradient-to-b from-white to-gray-100 text-gray-900">
        <div class="mx-auto max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
            <div class="space-y-4 text-center lg:text-left">
                <p class="text-sm uppercase tracking-[0.2em] text-blue-700">West Midlands ready</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold leading-tight">Built for local compliance and continuity.</h2>
                <p class="text-lg text-gray-700">Our engineers are versed in UK workplace regulations, insurance requirements, and landlord approvals, providing reports and certification that keep Birmingham and West Midlands sites audit-ready.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 space-y-4">
                <h3 class="text-xl md:text-2xl font-semibold">Planned & reactive cover</h3>
                <p class="text-gray-700">Scheduled maintenance programmes, PAT testing, and rapid fault response for schools, healthcare, manufacturing, and hospitality venues.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 space-y-4">
                <h3 class="text-xl md:text-2xl font-semibold">Connected from cabling to cloud</h3>
                <p class="text-gray-700">Integrated electrical, CCTV, access control, and network design so your critical systems communicate securely across every site.</p>
            </div>
        </div>
        <div class="mx-auto max-w-6xl mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-gray-800">
            <div class="flex items-center gap-4 bg-white rounded-2xl p-6 shadow-md border border-gray-100">
                <div class="h-12 w-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">24/7</div>
                <div>
                    <p class="font-semibold">Emergency cover</p>
                    <p class="text-sm text-gray-600">Rapid call-outs for critical faults and safety systems.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-white rounded-2xl p-6 shadow-md border border-gray-100">
                <div class="h-12 w-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">ISO</div>
                <div>
                    <p class="font-semibold">Standards aligned</p>
                    <p class="text-sm text-gray-600">Work delivered to UK standards with clear documentation.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-white rounded-2xl p-6 shadow-md border border-gray-100">
                <div class="h-12 w-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">360°</div>
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
            <div class="text-center max-w-4xl mx-auto mb-16 space-y-4">
                <h2 class="text-4xl md:text-5xl font-semibold tracking-tight">
                    Electrical, fire, and security solutions from trusted manufacturers
                </h2>
                <p class="text-lg text-gray-300">
                    Specify systems built around proven partners like Hager for electrical distribution, C-TEC for fire and emergency communications, and HikVision for CCTV and access control. Our Birmingham-based engineers design, install, and maintain end-to-end solutions that keep West Midlands sites compliant and secure.
                </p>
            </div>
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
