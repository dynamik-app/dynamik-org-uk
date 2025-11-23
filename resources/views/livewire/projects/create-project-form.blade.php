<div>
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Project details</h3>
        <p class="text-sm text-gray-600">Create a project for your default company. Link it to a client or keep it unassigned.</p>
    </div>

    @if (session('status'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-6">
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label class="block text-sm font-medium text-gray-700" for="client_id">Client (optional)</label>
                <button type="button" class="text-sm text-blue-600 hover:text-blue-800" wire:click="toggleClientForm">
                    {{ $showClientForm ? 'Hide inline client create' : 'Add new client inline' }}
                </button>
            </div>
            <select id="client_id" wire:model="selectedClientId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">No client (unassigned)</option>
                @forelse ($clients as $client)
                    <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                @empty
                    <option value="" disabled>No clients available yet</option>
                @endforelse
            </select>
            @error('selectedClientId')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if ($showClientForm)
            <div class="p-4 border border-blue-100 bg-blue-50 rounded-lg space-y-4">
                <div class="flex items-start justify-between">
                    <div>
                        <h4 class="text-base font-semibold text-gray-900">Add client inline</h4>
                        <p class="text-sm text-gray-600">Save a new client without leaving this page.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_name">Client name</label>
                        <input id="new_client_name" wire:model.defer="clientForm.name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @error('clientForm.name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_contact">Primary contact</label>
                        <input id="new_client_contact" wire:model.defer="clientForm.contact_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('clientForm.contact_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_email">Email</label>
                        <input id="new_client_email" wire:model.defer="clientForm.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('clientForm.email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_phone">Phone</label>
                        <input id="new_client_phone" wire:model.defer="clientForm.phone" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('clientForm.phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_address">Address</label>
                        <textarea id="new_client_address" wire:model.defer="clientForm.address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        @error('clientForm.address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_city">City</label>
                        <input id="new_client_city" wire:model.defer="clientForm.city" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('clientForm.city')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_postcode">Postcode</label>
                        <input id="new_client_postcode" wire:model.defer="clientForm.postcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('clientForm.postcode')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200" wire:click="toggleClientForm">Cancel</button>
                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 disabled:opacity-50" wire:click="createClient" wire:loading.attr="disabled" wire:target="createClient">
                        <span wire:loading.remove wire:target="createClient">Save client</span>
                        <span wire:loading wire:target="createClient">Saving...</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="name">Project / location name</label>
                <input id="name" wire:model.defer="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="postcode">Postcode</label>
                <input id="postcode" wire:model.defer="postcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('postcode')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                <textarea id="address" wire:model.defer="address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                @error('address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                <input id="city" wire:model.defer="city" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('city')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700" for="notes">Notes</label>
                <textarea id="notes" wire:model.defer="notes" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                @error('notes')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 disabled:opacity-50" wire:loading.attr="disabled" wire:target="save,createClient">
                <span wire:loading.remove wire:target="save">Create project</span>
                <span wire:loading wire:target="save">Creating...</span>
            </button>
        </div>
    </form>
</div>
