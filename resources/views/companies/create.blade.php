<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Company details</h3>

                    <form method="POST" action="{{ route('companies.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="registered_name">Registered name</label>
                            <input id="registered_name" name="registered_name" type="text" required
                                   value="{{ old('registered_name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                            @error('registered_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="companies_house_number">Companies House number</label>
                                <input id="companies_house_number" name="companies_house_number" type="text"
                                       value="{{ old('companies_house_number') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('companies_house_number')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="registered_status">Registered status</label>
                                <input id="registered_status" name="registered_status" type="text"
                                       value="{{ old('registered_status') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('registered_status')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="incorporation_date">Incorporation date</label>
                            <input id="incorporation_date" name="incorporation_date" type="date"
                                   value="{{ old('incorporation_date') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                            @error('incorporation_date')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="registered_address">Registered address</label>
                            <textarea id="registered_address" name="registered_address" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('registered_address') }}</textarea>
                            @error('registered_address')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="paye_reference">PAYE reference</label>
                                <input id="paye_reference" name="paye_reference" type="text"
                                       value="{{ old('paye_reference') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('paye_reference')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="corporation_tax_utr">Corporation tax UTR</label>
                                <input id="corporation_tax_utr" name="corporation_tax_utr" type="text"
                                       value="{{ old('corporation_tax_utr') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('corporation_tax_utr')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="vat_number">VAT number</label>
                                <input id="vat_number" name="vat_number" type="text"
                                       value="{{ old('vat_number') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('vat_number')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('dashboard') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200">Cancel</a>
                            <x-primary-button>
                                Save company
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
