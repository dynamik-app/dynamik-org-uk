<div>
    @push('meta')
        @php
            $solutionItems = $solutions->map(function ($solution, $index) {
                return [
                    '@type' => 'Service',
                    'name' => $solution->name,
                    'position' => $index + 1,
                    'description' => $solution->description,
                    'url' => $solution->slug ? route('solutions.show', $solution->slug) : url('/solutions'),
                    'areaServed' => 'West Midlands',
                ];
            });
        @endphp
        <meta name="description" content="Electrical and technology solutions designed in Birmingham for organisations across the West Midlands." />
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'name' => 'Dynamik Solutions',
                'description' => 'A catalogue of electrical and technology services delivered across the West Midlands and the UK.',
                'url' => url('/solutions'),
                'itemListElement' => $solutionItems,
            ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solutions') }}
        </h2>
    </x-slot>

    <div class="py-16 md:py-24 bg-gradient-to-b from-gray-900 via-slate-900 to-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[2fr,1fr] items-start">
                <div class="space-y-10">
                    <div class="relative overflow-hidden rounded-3xl text-white shadow-2xl border border-white/10 bg-gradient-to-r from-gray-900 via-slate-900 to-blue-900">
                        <div class="absolute inset-0 opacity-25 bg-[radial-gradient(circle_at_20%_30%,_rgba(59,130,246,0.45),_transparent_40%),_radial-gradient(circle_at_80%_80%,_rgba(14,165,233,0.35),_transparent_40%)]"></div>
                        <div class="relative p-10 lg:p-14 space-y-7">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-100">Built for critical environments</p>
                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-semibold leading-tight">
                                Precision-led electrical solutions crafted to keep every part of your operation switched on.
                            </h1>
                            <p class="text-lg text-gray-100 max-w-3xl">
                                From resilient power systems to intelligent automation, we build, install, and maintain infrastructure that delivers measurable outcomes, long-term reliability, and peace of mind.
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 text-sm text-gray-200">
                                <div class="flex flex-col space-y-1 p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <span class="text-xs uppercase tracking-[0.2em] text-blue-100">Industries</span>
                                    <span class="font-semibold">Healthcare, Hospitality, Commercial</span>
                                </div>
                                <div class="flex flex-col space-y-1 p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <span class="text-xs uppercase tracking-[0.2em] text-blue-100">Delivery model</span>
                                    <span class="font-semibold">Design · Build · Maintain</span>
                                </div>
                                <div class="flex flex-col space-y-1 p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <span class="text-xs uppercase tracking-[0.2em] text-blue-100">Coverage</span>
                                    <span class="font-semibold">Across the United Kingdom</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/5 backdrop-blur shadow-2xl sm:rounded-3xl border border-white/10">
                        <div class="p-8 border-b border-white/10 text-white text-center sm:text-left">
                            <p class="text-xs uppercase tracking-[0.2em] text-blue-100">Our services</p>
                            <h2 class="mt-2 text-3xl md:text-4xl font-semibold">{{ __('Solutions built to impress and perform') }}</h2>
                            <p class="mt-3 text-sm md:text-base text-gray-200">{{ __('Explore tailored services with clean storytelling and the same navigation you expect across our knowledge base.') }}</p>
                        </div>
                        <div class="grid gap-6 p-6 md:grid-cols-2">
                            @forelse ($solutions as $solution)
                                <article class="group relative rounded-2xl border border-white/10 bg-white/5 p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl backdrop-blur">
                                    <div class="flex items-start justify-between gap-4">
                                        <h3 class="text-xl md:text-2xl font-semibold text-white">{{ $solution->name }}</h3>
                                        @if ($solution->slug)
                                            <a href="{{ route('solutions.show', $solution->slug) }}" class="inline-flex items-center text-sm font-semibold text-blue-200 opacity-0 transition group-hover:opacity-100">
                                                {{ __('View detail') }}
                                                <span aria-hidden="true" class="ml-1">→</span>
                                            </a>
                                        @endif
                                    </div>
                                    <p class="mt-3 text-sm text-gray-100 leading-relaxed">
                                        {{ $solution->description }}
                                    </p>
                                    @if ($solution->content)
                                        <p class="mt-4 text-sm text-gray-200 leading-relaxed">
                                            {{ Illuminate\Support\Str::limit(strip_tags($solution->content), 140) }}
                                        </p>
                                    @endif
                                    <div class="mt-5 grid grid-cols-2 gap-3 text-sm text-gray-100">
                                        <div class="space-y-2">
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-blue-300"></span>
                                                <span>{{ __('Outcome-driven delivery with proactive maintenance built in.') }}</span>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-blue-300"></span>
                                                <span>{{ __('Turnkey handover with training, documentation, and compliance support.') }}</span>
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-blue-300"></span>
                                                <span>{{ __('Designed for uptime with redundant checks and responsive call-outs.') }}</span>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-blue-300"></span>
                                                <span>{{ __('Built with modern materials, future-ready cabling, and clear ROI focus.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <p class="col-span-2 text-center text-sm text-gray-200">{{ __('New solutions are coming soon. Check back shortly for our latest capabilities.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white/10 backdrop-blur shadow-2xl sm:rounded-3xl border border-white/10 text-white">
                        <div class="p-8 border-b border-white/10">
                            <h2 class="text-xl md:text-2xl font-semibold">{{ __('Work with our specialists') }}</h2>
                            <p class="mt-2 text-sm text-gray-200">{{ __('Book time with our engineers to map your project goals and timelines.') }}</p>
                        </div>
                        <div class="p-8 space-y-5">
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-white/15 text-white flex items-center justify-center font-semibold">UK</div>
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ __('Nationwide coverage') }}</p>
                                    <p class="text-xs text-gray-200">{{ __('Local teams with central project oversight.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-white/15 text-white flex items-center justify-center font-semibold">24/7</div>
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ __('Always-on support') }}</p>
                                    <p class="text-xs text-gray-200">{{ __('Rapid response for maintenance and critical incidents.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-white/15 text-white flex items-center justify-center font-semibold">QA</div>
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ __('Quality first') }}</p>
                                    <p class="text-xs text-gray-200">{{ __('Installation playbooks and safety assurance on every site.') }}</p>
                                </div>
                            </div>
                            <a href="/contact" class="inline-flex items-center justify-center rounded-full bg-blue-500 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-400 transition shadow-lg shadow-blue-500/30">{{ __('Talk to our team') }}</a>
                        </div>
                    </div>

                    <div class="bg-white/5 backdrop-blur text-white rounded-3xl p-8 shadow-2xl border border-white/10">
                        <h2 class="text-xl font-semibold">{{ __('Looking for documentation?') }}</h2>
                        <p class="mt-2 text-sm text-gray-200">{{ __('Visit our Knowledge Base for guides, standards, and operational playbooks used across every solution.') }}</p>
                        <a href="{{ route('knowledge-base.index') }}" class="mt-5 inline-flex items-center rounded-full bg-white px-5 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-100">{{ __('Browse Knowledge Base') }}</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
