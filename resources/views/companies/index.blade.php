<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-900">Company access</h3>
                    <p class="text-sm text-gray-600 mt-1">Review every company you own or manage and choose a default for quick actions.</p>

                    @if ($companies->isEmpty())
                        <div class="mt-6 p-4 border border-dashed border-gray-300 rounded-md text-sm text-gray-600">
                            You don't have any companies yet. <a href="{{ route('companies.create') }}" class="text-blue-600 hover:underline">Create one now</a> or ask an owner to invite you.
                        </div>
                    @else
                        <form method="POST" action="{{ route('companies.default') }}" class="mt-6 space-y-4">
                            @csrf
                            @foreach ($companies as $company)
                                <label class="flex items-start gap-4 p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-gray-50 cursor-pointer">
                                    <input
                                        type="radio"
                                        name="company_id"
                                        value="{{ $company->id }}"
                                        class="mt-1 h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                        @checked($company->id === $defaultCompanyId)
                                    >
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-base font-semibold text-gray-900">{{ $company->registered_name }}</p>
                                                <p class="text-sm text-gray-600">ID: {{ $company->id }}</p>
                                            </div>
                                            @if ($company->id === $defaultCompanyId)
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Default</span>
                                            @endif
                                        </div>
                                        <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">{{ $company->membership_type }}</span>
                                            @if ($company->companies_house_number)
                                                <span class="text-xs text-gray-500">Companies House: {{ $company->companies_house_number }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-sm text-gray-600">Your selection will be used when performing company-specific operations.</p>
                                <x-primary-button>
                                    {{ __('Save default company') }}
                                </x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
