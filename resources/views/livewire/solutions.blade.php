<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solutions') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[2fr,1fr]">
                <div class="space-y-8">
                    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-black text-white shadow-xl sm:rounded-lg overflow-hidden">
                        <div class="p-10 lg:p-12 space-y-6">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-200">Built for critical environments</p>
                            <h1 class="text-3xl md:text-4xl font-semibold leading-tight">
                                Precision-led electrical solutions crafted to keep every part of your operation switched on.
                            </h1>
                            <p class="text-lg text-gray-200 max-w-3xl">
                                From resilient power systems to intelligent automation, we build, install, and maintain infrastructure that delivers measurable outcomes, long-term reliability, and peace of mind.
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-300">
                                <div class="flex flex-col space-y-1">
                                    <span class="text-xs uppercase tracking-wide text-indigo-200">Industries</span>
                                    <span class="font-semibold">Healthcare, Hospitality, Commercial</span>
                                </div>
                                <div class="flex flex-col space-y-1">
                                    <span class="text-xs uppercase tracking-wide text-indigo-200">Delivery model</span>
                                    <span class="font-semibold">Design · Build · Maintain</span>
                                </div>
                                <div class="flex flex-col space-y-1">
                                    <span class="text-xs uppercase tracking-wide text-indigo-200">Coverage</span>
                                    <span class="font-semibold">Across the United Kingdom</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-lg font-semibold text-gray-900">{{ __('Our solutions') }}</h2>
                            <p class="text-sm text-gray-500">{{ __('Explore tailored services with clean storytelling and the same navigation you expect across our knowledge base.') }}</p>
                        </div>
                        <div class="grid gap-6 p-6 md:grid-cols-2">
                            @forelse ($solutions as $solution)
                                <article class="group relative rounded-xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                    <div class="flex items-start justify-between gap-4">
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $solution->name }}</h3>
                                        @if ($solution->slug)
                                            <a href="{{ route('solutions.show', $solution->slug) }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 opacity-0 transition group-hover:opacity-100">
                                                {{ __('View detail') }}
                                                <span aria-hidden="true" class="ml-1">→</span>
                                            </a>
                                        @endif
                                    </div>
                                    <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                                        {{ $solution->description }}
                                    </p>
                                    @if ($solution->content)
                                        <p class="mt-4 text-sm text-gray-500 leading-relaxed">
                                            {{ Illuminate\Support\Str::limit(strip_tags($solution->content), 140) }}
                                        </p>
                                    @endif
                                    <div class="mt-5 grid grid-cols-2 gap-3 text-sm text-gray-700">
                                        <div class="space-y-2">
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-indigo-500"></span>
                                                <span>{{ __('Outcome-driven delivery with proactive maintenance built in.') }}</span>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-indigo-500"></span>
                                                <span>{{ __('Turnkey handover with training, documentation, and compliance support.') }}</span>
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-indigo-500"></span>
                                                <span>{{ __('Designed for uptime with redundant checks and responsive call-outs.') }}</span>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <span class="mt-2 h-2 w-2 rounded-full bg-indigo-500"></span>
                                                <span>{{ __('Built with modern materials, future-ready cabling, and clear ROI focus.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <p class="col-span-2 text-center text-sm text-gray-500">{{ __('New solutions are coming soon. Check back shortly for our latest capabilities.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-lg font-semibold text-gray-900">{{ __('Work with our specialists') }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ __('Book time with our engineers to map your project goals and timelines.') }}</p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold">UK</div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ __('Nationwide coverage') }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Local teams with central project oversight.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold">24/7</div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ __('Always-on support') }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Rapid response for maintenance and critical incidents.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold">QA</div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ __('Quality first') }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Installation playbooks and safety assurance on every site.') }}</p>
                                </div>
                            </div>
                            <a href="/contact" class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-3 text-sm font-semibold text-white hover:bg-gray-800 transition">{{ __('Talk to our team') }}</a>
                        </div>
                    </div>

                    <div class="bg-gray-900 text-white rounded-lg p-6">
                        <h2 class="text-lg font-semibold">{{ __('Looking for documentation?') }}</h2>
                        <p class="mt-2 text-sm text-gray-200">{{ __('Visit our Knowledge Base for guides, standards, and operational playbooks used across every solution.') }}</p>
                        <a href="{{ route('knowledge-base.index') }}" class="mt-4 inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-100">{{ __('Browse Knowledge Base') }}</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
