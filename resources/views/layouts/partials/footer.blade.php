<footer class="bg-gray-950 text-gray-300 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div class="space-y-3">
                <p class="text-xs uppercase tracking-[0.2em] text-gray-400">Dynamik / West Midlands</p>
                <h2 class="text-2xl sm:text-3xl font-semibold text-white">Precision-led electrical solutions that keep your operations switched on.</h2>
                <p class="text-sm text-gray-400">Built in Birmingham, supporting organisations across the West Midlands and nationwide.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/contact" class="inline-flex items-center justify-center px-4 py-3 rounded-full bg-white text-gray-900 font-semibold text-sm shadow-lg hover:bg-gray-200 transition">Talk to our team</a>
                <a href="tel:01214859795" class="inline-flex items-center justify-center px-4 py-3 rounded-full border border-gray-600 text-sm font-semibold text-white hover:border-gray-400 transition">Call 0121 485 9795</a>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-10">
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-white">Solutions</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/solutions" class="hover:text-white">Overview</a></li>
                    <li><a href="/solutions" class="hover:text-white">Design · Build · Maintain</a></li>
                    <li><a href="/solutions" class="hover:text-white">Critical environments</a></li>
                    <li><a href="/solutions" class="hover:text-white">West Midlands projects</a></li>
                </ul>
            </div>
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-white">Resources</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('knowledge-base.index') }}" class="hover:text-white">Knowledge Base</a></li>
                    <li><a href="{{ route('shop.index') }}" class="hover:text-white">Shop</a></li>
                    <li><a href="/blog" class="hover:text-white">Insights</a></li>
                    <li><a href="/plan" class="hover:text-white">Planning tools</a></li>
                </ul>
            </div>
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-white">Company</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/" class="hover:text-white">About Dynamik</a></li>
                    <li><a href="/solutions" class="hover:text-white">Our approach</a></li>
                    <li><a href="/contact" class="hover:text-white">Careers & partnerships</a></li>
                    <li><a href="/terms" class="hover:text-white">Terms & policies</a></li>
                </ul>
            </div>
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-white">Contact</h3>
                <div class="space-y-2 text-sm text-gray-400">
                    <p class="text-white font-semibold">0121 485 9795</p>
                    <p><a href="mailto:hello@dynamik.org.uk" class="hover:text-white">hello@dynamik.org.uk</a></p>
                    <p>14 Buckingham Street<br>Birmingham, B19 3HT</p>
                    <p class="text-gray-400">Serving the West Midlands with nationwide coverage.</p>
                </div>
            </div>
        </div>

        <div class="text-xs text-gray-500 border-t border-gray-800 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <p>© {{ now()->year }} Dynamik. Engineered in the West Midlands.</p>
            <div class="flex items-center gap-4">
                <a href="/policy" class="hover:text-white">Privacy</a>
                <a href="/terms" class="hover:text-white">Terms</a>
                <a href="/contact" class="hover:text-white">Contact</a>
            </div>
        </div>
    </div>
</footer>
