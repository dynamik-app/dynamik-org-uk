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

    <!-- Trust & Partnership Section -->
    <section class="w-full py-24 px-4 bg-white text-gray-900">
        <div class="mx-auto max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-semibold tracking-tight mb-4">
                Your Trusted Electrical Partner in the UK.
            </h2>
            <p class="text-lg md:text-xl font-light text-gray-700 max-w-3xl mx-auto mb-8">
                DYNAMIK delivers dependable electrical expertise for hospitality, commercial kitchens, hospitals, health centres, and mission-critical facilities across the UK. We design, install, and maintain the infrastructure that keeps your organisation operating without interruption.
            </p>
            <a href="/solutions" class="inline-block px-8 py-3 text-lg font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                Explore Our Expertise
            </a>
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
