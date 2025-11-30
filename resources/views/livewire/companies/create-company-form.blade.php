<div>
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

                    @if ($companies_house_snapshot)
                        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-sm text-blue-900">
                            <p class="font-semibold">Companies House match</p>
                            <p class="mt-1">{{ $companies_house_snapshot['company_name'] ?? 'Unknown name' }}</p>
                            @if (!empty($companies_house_snapshot['company_status']))
                                <p class="mt-1 text-xs uppercase tracking-wide">Status: {{ $companies_house_snapshot['company_status'] }}</p>
                            @endif
                        </div>
                    @endif

                    <form wire:submit.prevent="save" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="registered_name">Registered name</label>
                            <input id="registered_name" type="text" wire:model.defer="registered_name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
            @error('registered_name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="companies_house_number">Companies House number</label>
                <div class="flex gap-2">
                    <input id="companies_house_number" type="text" wire:model.defer="companies_house_number"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                    <button type="button" wire:click="lookup" class="mt-1 inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                        Lookup
                    </button>
                </div>
                @error('companies_house_number')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                @if ($lookupError)
                    <p class="text-sm text-red-600 mt-1">{{ $lookupError }}</p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="registered_status">Registered status</label>
                <input id="registered_status" type="text" wire:model.defer="registered_status"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('registered_status')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700" for="incorporation_date">Incorporation date</label>
            <input id="incorporation_date" type="date" wire:model.defer="incorporation_date"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
            @error('incorporation_date')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700" for="registered_address">Registered address</label>
            <textarea id="registered_address" rows="3" wire:model.defer="registered_address"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            @error('registered_address')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
            @if ($companies_house_snapshot)
                <p class="text-xs text-gray-600 mt-2">Prefilled from Companies House lookup.</p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="paye_reference">PAYE reference</label>
                <input id="paye_reference" type="text" wire:model.defer="paye_reference"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('paye_reference')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="corporation_tax_utr">Corporation tax UTR</label>
                <input id="corporation_tax_utr" type="text" wire:model.defer="corporation_tax_utr"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('corporation_tax_utr')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="vat_number">VAT number</label>
                <input id="vat_number" type="text" wire:model.defer="vat_number"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('vat_number')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('dashboard') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200">Cancel</a>
                            <x-primary-button wire:loading.attr="disabled">
                                <span wire:loading.remove>Save company</span>
                                <span wire:loading>Saving...</span>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
