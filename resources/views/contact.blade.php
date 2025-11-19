<x-app-layout>
    @push('meta')
        <meta name="description" content="Speak with Dynamik's West Midlands engineers for electrical design, installation, and maintenance across Birmingham and the wider region." />
        <meta name="keywords" content="West Midlands electrical contractor, Birmingham electrical solutions, infrastructure maintenance, Dynamik contact" />
        @php
            $contactSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'headline' => 'Contact Dynamik',
                'description' => 'Get in touch with Dynamik for precision-led electrical and technology solutions in the West Midlands.',
                'url' => url('/contact'),
                'mainEntity' => [
                    '@type' => 'LocalBusiness',
                    'name' => config('app.name', 'Dynamik'),
                    'telephone' => '01214859795',
                    'email' => 'hello@dynamik.org.uk',
                    'areaServed' => [
                        [
                            '@type' => 'AdministrativeArea',
                            'name' => 'West Midlands',
                        ],
                    ],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '14 Buckingham Street',
                        'addressLocality' => 'Birmingham',
                        'postalCode' => 'B19 3HT',
                        'addressRegion' => 'West Midlands',
                        'addressCountry' => 'GB',
                    ],
                    'contactPoint' => [
                        [
                            '@type' => 'ContactPoint',
                            'telephone' => '01214859795',
                            'contactType' => 'customer service',
                            'email' => 'hello@dynamik.org.uk',
                            'availableLanguage' => ['English'],
                            'areaServed' => 'West Midlands',
                        ],
                    ],
                ],
            ];
        @endphp
        <script type="application/ld+json">
            {!! json_encode($contactSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endpush

    <div class="bg-gradient-to-b from-gray-50 via-white to-gray-100">
        <section class="pt-16 pb-12 md:pb-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                    <div class="space-y-6 max-w-3xl">
                        <p class="text-xs uppercase tracking-[0.2em] text-gray-500">Contact</p>
                        <h1 class="text-4xl sm:text-5xl font-semibold text-gray-900 leading-tight">Speak with the team powering West Midlands infrastructure.</h1>
                        <p class="text-lg text-gray-600">From electrical design to rapid maintenance call-outs, Dynamik supports hospitals, hospitality, commercial estates, and critical environments across Birmingham and the wider West Midlands.</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="tel:01214859795" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-gray-900 text-white text-sm font-semibold shadow-lg hover:bg-black transition">Call 0121 485 9795</a>
                            <a href="mailto:hello@dynamik.org.uk" class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-gray-900 text-gray-900 text-sm font-semibold hover:bg-gray-900 hover:text-white transition">Email us</a>
                            <a href="/solutions" class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-gray-200 text-gray-900 text-sm font-semibold hover:border-gray-400 transition">View solutions</a>
                        </div>
                    </div>
                    <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 border border-gray-100 w-full md:max-w-sm">
                        <h2 class="text-lg font-semibold text-gray-900">West Midlands response desk</h2>
                        <p class="mt-2 text-sm text-gray-500">We triage every enquiry within one business day and schedule site work with a dedicated project lead.</p>
                        <div class="mt-6 space-y-4 text-sm text-gray-700">
                            <div class="flex justify-between"><span class="text-gray-500">Phone</span><a class="font-semibold text-gray-900 hover:underline" href="tel:01214859795">0121 485 9795</a></div>
                            <div class="flex justify-between"><span class="text-gray-500">Email</span><a class="font-semibold text-gray-900 hover:underline" href="mailto:hello@dynamik.org.uk">hello@dynamik.org.uk</a></div>
                            <div class="flex justify-between"><span class="text-gray-500">Address</span><span class="text-right">14 Buckingham Street<br>Birmingham, B19 3HT</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Service area</span><span class="font-semibold text-gray-900">West Midlands & UK</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Hours</span><span class="font-semibold text-gray-900">Mon–Fri 08:00–18:00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-3">
                    <div class="lg:col-span-2 space-y-10">
                        <div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-100 space-y-6">
                            <h2 class="text-2xl font-semibold text-gray-900">How we work</h2>
                            <div class="grid md:grid-cols-3 gap-6 text-sm text-gray-700">
                                <div class="space-y-2">
                                    <p class="text-xs uppercase tracking-[0.2em] text-gray-500">Consult</p>
                                    <p class="font-semibold text-gray-900">Site assessments</p>
                                    <p class="text-gray-600">Engineers document existing infrastructure, risks, and uptime requirements.</p>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-xs uppercase tracking-[0.2em] text-gray-500">Design</p>
                                    <p class="font-semibold text-gray-900">Evidence-led proposals</p>
                                    <p class="text-gray-600">Clear recommendations backed by compliance, lifecycle costing, and phasing.</p>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-xs uppercase tracking-[0.2em] text-gray-500">Deploy</p>
                                    <p class="font-semibold text-gray-900">Dedicated delivery</p>
                                    <p class="text-gray-600">West Midlands teams complete works with transparent reporting and closeout packs.</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-900 text-white rounded-2xl p-8 space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.2em] text-gray-400">Schedule</p>
                                    <h3 class="text-2xl font-semibold">Book a project consultation</h3>
                                    <p class="text-sm text-gray-300 mt-2">Tell us about your site in the West Midlands and we will assign a lead engineer.</p>
                                </div>
                                <a href="mailto:hello@dynamik.org.uk?subject=Project%20consultation%20request" class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-white text-gray-900 text-sm font-semibold shadow hover:bg-gray-200 transition">Email project brief</a>
                            </div>
                            <ul class="grid sm:grid-cols-3 gap-4 text-sm text-gray-200">
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>Safety-first working methods and RAMS included.</li>
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>Planned preventative maintenance aligned to your environment.</li>
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>Specialists in live environments, hospitality, and healthcare estates.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-100 space-y-6">
                            <h2 class="text-xl font-semibold text-gray-900">Visit us</h2>
                            <p class="text-sm text-gray-600">Meet the team at our Birmingham hub to review designs, mock-ups, and maintenance packs.</p>
                            <div class="space-y-3 text-sm text-gray-700">
                                <p class="font-semibold text-gray-900">14 Buckingham Street</p>
                                <p>Birmingham, B19 3HT</p>
                                <p>West Midlands, United Kingdom</p>
                            </div>
                            <a href="https://maps.google.com/?q=14+Buckingham+Street+Birmingham+B19+3HT" target="_blank" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-500">Open in Maps</a>
                        </div>

                        <div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-100 space-y-4">
                            <h2 class="text-xl font-semibold text-gray-900">Looking for something specific?</h2>
                            <ul class="space-y-3 text-sm text-gray-700">
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-indigo-500"></span><a href="/solutions" class="hover:underline text-gray-900">Explore our solutions</a></li>
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-indigo-500"></span><a href="{{ route('knowledge-base.index') }}" class="hover:underline text-gray-900">Browse the Knowledge Base</a></li>
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-indigo-500"></span><a href="/shop" class="hover:underline text-gray-900">Order materials and components</a></li>
                                <li class="flex items-start gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-indigo-500"></span><a href="mailto:hello@dynamik.org.uk?subject=Emergency%20call%20out" class="hover:underline text-gray-900">Request an emergency call-out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
