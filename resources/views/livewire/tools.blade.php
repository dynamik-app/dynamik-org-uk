<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Tools') }}</h1>
    </x-slot>

    @push('meta')
        <meta name="description" content="Engineer-ready calculators and utilities to support field installations." />
    @endpush

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="grid gap-6 lg:grid-cols-[2fr,1fr] items-stretch">
                <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-black text-white rounded-xl shadow-xl overflow-hidden flex flex-col justify-between p-8 sm:p-10">
                    <div class="space-y-4">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-200">Built for field engineers</p>
                        <h2 class="text-3xl md:text-4xl font-semibold leading-tight">{{ __('Tools that keep your fire and life safety projects moving.') }}</h2>
                        <p class="text-lg text-gray-200 max-w-3xl">{{ __('Use the calculators below to size batteries and validate alarm loads with confidence, even when you are on-site and short on time.') }}</p>
                    </div>
                    <dl class="mt-8 grid gap-4 sm:grid-cols-3 text-sm text-gray-200">
                        <div class="border border-white/10 rounded-lg p-4 bg-white/5 backdrop-blur">
                            <dt class="text-indigo-100 text-xs uppercase tracking-wide">Designed for</dt>
                            <dd class="mt-2 font-semibold">Fire alarm systems</dd>
                        </div>
                        <div class="border border-white/10 rounded-lg p-4 bg-white/5 backdrop-blur">
                            <dt class="text-indigo-100 text-xs uppercase tracking-wide">Optimised for</dt>
                            <dd class="mt-2 font-semibold">On-site decision making</dd>
                        </div>
                        <div class="border border-white/10 rounded-lg p-4 bg-white/5 backdrop-blur">
                            <dt class="text-indigo-100 text-xs uppercase tracking-wide">Next additions</dt>
                            <dd class="mt-2 font-semibold">More tools coming soon</dd>
                        </div>
                    </dl>
                </div>
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6 flex flex-col justify-center h-full">
                    <p class="text-sm font-semibold text-gray-700">{{ __('Toolkit overview') }}</p>
                    <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ __('Practical utilities built around your installs.') }}</h3>
                    <p class="mt-3 text-sm text-gray-600 leading-relaxed">{{ __('Every tool is designed to be fast, clear, and field-ready—so you can record a few numbers and immediately see what battery pack or accessory you need to order.') }}</p>
                    <div class="mt-4 flex items-center gap-3 text-sm text-gray-700">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 font-semibold">1</span>
                        <div>
                            <p class="font-semibold">Fire Alarm Battery Size Calculator</p>
                            <p class="text-gray-500">Enter standby and alarm loads to see the recommended capacity instantly.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6 flex flex-col h-full">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ __('Fire Alarm Battery Size Calculator') }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ __('Get a live view of standby and alarm demand so you can select the right battery on-site.') }}</p>
                        </div>
                        <span class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold uppercase text-indigo-700">Live</span>
                    </div>
                    <div class="mt-4 flex-1">
                        <livewire:tools.fire-alarm-battery-calculator />
                    </div>
                </div>

                <div class="bg-white border border-dashed border-gray-200 rounded-xl shadow-sm p-6 flex flex-col h-full justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-indigo-600">{{ __('Coming soon') }}</p>
                        <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ __('More tools for field engineers') }}</h3>
                        <p class="mt-3 text-sm text-gray-600 leading-relaxed">{{ __('Load calculators, compliance checklists, and commissioning helpers will be added here. Share what you need most and we will prioritise it.') }}</p>
                    </div>
                    <div class="mt-6 flex items-center gap-3 text-sm text-gray-700">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-900 text-white font-semibold">→</span>
                        <div>
                            <p class="font-semibold">{{ __('Tell us what to build next') }}</p>
                            <p class="text-gray-500">{{ __('Drop a note via the contact page and we will add your request to the roadmap.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
