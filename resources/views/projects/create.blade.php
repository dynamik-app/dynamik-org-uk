<x-app-layout x-data="projectCreate()" x-init="init()">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create project') }}</h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Back to projects</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Project details</h3>
                        <p class="text-sm text-gray-600">Create a project for your default company and link it to a client.</p>
                    </div>

                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="block text-sm font-medium text-gray-700" for="client_id">Client</label>
                                <button type="button" class="text-sm text-blue-600 hover:text-blue-800" @click="toggleClientForm">
                                    <span x-text="showClientForm ? 'Hide inline client create' : 'Add new client inline'"></span>
                                </button>
                            </div>
                            <select id="client_id" name="client_id" x-model="selectedClient" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" :disabled="clients.length === 0" required>
                                <template x-if="clients.length === 0">
                                    <option value="">No clients available. Add one first.</option>
                                </template>
                                <template x-for="client in clients" :key="client.id">
                                    <option :value="client.id" x-text="client.name"></option>
                                </template>
                            </select>
                            @error('client_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <template x-if="showClientForm">
                            <div class="p-4 border border-blue-100 bg-blue-50 rounded-lg space-y-4">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="text-base font-semibold text-gray-900">Add client inline</h4>
                                        <p class="text-sm text-gray-600">Save a new client without leaving this page.</p>
                                    </div>
                                    <template x-if="clientError">
                                        <span class="text-sm text-red-700" x-text="clientError"></span>
                                    </template>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_name">Client name</label>
                                        <input id="new_client_name" x-model="clientForm.name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_contact">Primary contact</label>
                                        <input id="new_client_contact" x-model="clientForm.contact_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_email">Email</label>
                                        <input id="new_client_email" x-model="clientForm.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_phone">Phone</label>
                                        <input id="new_client_phone" x-model="clientForm.phone" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_address">Address</label>
                                        <textarea id="new_client_address" x-model="clientForm.address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_city">City</label>
                                        <input id="new_client_city" x-model="clientForm.city" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="new_client_postcode">Postcode</label>
                                        <input id="new_client_postcode" x-model="clientForm.postcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200" @click="toggleClientForm">Cancel</button>
                                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 disabled:opacity-50" @click="createClient" :disabled="clientSaving">
                                        <span x-show="!clientSaving">Save client</span>
                                        <span x-show="clientSaving">Saving...</span>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="name">Project / location name</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="postcode">Postcode</label>
                                <input id="postcode" name="postcode" type="text" value="{{ old('postcode') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('postcode')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                                <textarea id="address" name="address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                                <input id="city" name="city" type="text" value="{{ old('city') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('city')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700" for="notes">Notes</label>
                                <textarea id="notes" name="notes" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3">
                            <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700" :disabled="clients.length === 0">Create project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function projectCreate() {
            return {
                clients: @js($clients->map(fn ($client) => ['id' => $client->id, 'name' => $client->name])->values()),
                selectedClient: @js(old('client_id') ?? ''),
                showClientForm: false,
                clientSaving: false,
                clientError: '',
                clientForm: {
                    name: '',
                    contact_name: '',
                    email: '',
                    phone: '',
                    address: '',
                    city: '',
                    postcode: '',
                },
                init() {
                    if (!this.selectedClient && this.clients[0]) {
                        this.selectedClient = this.clients[0].id;
                    }
                },
                toggleClientForm() {
                    this.showClientForm = !this.showClientForm;
                    this.clientError = '';
                },
                resetClientForm() {
                    this.clientForm = {
                        name: '',
                        contact_name: '',
                        email: '',
                        phone: '',
                        address: '',
                        city: '',
                        postcode: '',
                    };
                },
                async createClient() {
                    this.clientSaving = true;
                    this.clientError = '';

                    try {
                        const response = await fetch('{{ route('clients.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify(this.clientForm),
                        });

                        const data = await response.json();

                        if (!response.ok) {
                            if (data?.errors) {
                                this.clientError = Object.values(data.errors).flat().join(' ');
                            } else if (data?.message) {
                                this.clientError = data.message;
                            } else {
                                this.clientError = 'Unable to create client. Please try again.';
                            }
                            return;
                        }

                        this.clients.push(data.client);
                        this.selectedClient = data.client.id;
                        this.resetClientForm();
                        this.showClientForm = false;
                    } catch (error) {
                        this.clientError = 'Unable to create client. Please try again.';
                    } finally {
                        this.clientSaving = false;
                    }
                },
            };
        }
    </script>
</x-app-layout>
