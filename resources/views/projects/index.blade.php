<x-app-layout x-data="projectManager()" x-init="init()">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Projects') }}</h2>
            </div>
            <button type="button" @click="openProjectModal" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                {{ __('Add Project') }}
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Projects for your default company') }}</h3>
                            <p class="text-sm text-gray-600">Review all projects and add new ones while keeping them linked to a client.</p>
                        </div>
                        <a href="{{ route('companies.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Change default company</a>
                    </div>

                    @if ($projects->isEmpty())
                        <div class="p-6 border border-dashed border-gray-300 rounded-lg text-center text-gray-600">
                            <p class="text-base font-medium">You have not added any projects yet.</p>
                            <p class="text-sm mt-1">Create a project and link it to a client to get started.</p>
                            <div class="mt-4">
                                <button type="button" @click="openProjectModal" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Add your first project</button>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($projects as $project)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $project->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $project->client->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                @if ($project->address || $project->city || $project->postcode)
                                                    <div>{{ $project->address }}</div>
                                                    <div class="text-gray-500">{{ $project->city }} {{ $project->postcode }}</div>
                                                @else
                                                    <span class="text-gray-400 text-sm">No address provided</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                @if ($project->notes)
                                                    <div class="max-w-sm text-gray-700">{{ $project->notes }}</div>
                                                @else
                                                    <span class="text-gray-400 text-sm">No notes added</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div x-show="showProjectModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showProjectModal" @click="closeProjectModal" class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showProjectModal" class="inline-block align-bottom bg-white rounded-lg px-6 pt-5 pb-6 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full" @click.away="closeProjectModal">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add Project</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" @click="closeProjectModal">&times;</button>
                </div>

                <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium text-gray-700" for="client_id">Client</label>
                            <button type="button" class="text-sm text-blue-600 hover:text-blue-800" @click="openClientModal">Add new client</button>
                        </div>
                        <select id="client_id" name="client_id" x-model="selectedClient" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" :disabled="clients.length === 0" required>
                            <template x-if="clients.length === 0">
                                <option value="">No clients available. Add one first.</option>
                            </template>
                            <template x-for="client in clients" :key="client.id">
                                <option :value="client.id" x-text="client.name"></option>
                            </template>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="name">Project name</label>
                        <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="postcode">Postcode</label>
                            <input id="postcode" name="postcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                            <input id="city" name="city" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                        <textarea id="address" name="address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="notes">Notes</label>
                        <textarea id="notes" name="notes" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200" @click="closeProjectModal">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700" :disabled="clients.length === 0">Save project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Client Modal -->
    <div x-show="showClientModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="client-modal-title" role="dialog" aria-modal="true" x-cloak>
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showClientModal" @click="closeClientModal" class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showClientModal" class="inline-block align-bottom bg-white rounded-lg px-6 pt-5 pb-6 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full" @click.away="closeClientModal">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="client-modal-title">Add Client</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" @click="closeClientModal">&times;</button>
                </div>

                <template x-if="clientError">
                    <div class="mb-3 rounded-md bg-red-50 border border-red-200 px-4 py-2 text-sm text-red-800" x-text="clientError"></div>
                </template>

                <form class="space-y-4" @submit.prevent="createClient">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_name">Client name</label>
                        <input id="new_client_name" x-model="clientForm.name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="new_client_contact">Primary contact</label>
                            <input id="new_client_contact" x-model="clientForm.contact_name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="new_client_email">Email</label>
                            <input id="new_client_email" x-model="clientForm.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="new_client_phone">Phone</label>
                            <input id="new_client_phone" x-model="clientForm.phone" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="new_client_postcode">Postcode</label>
                            <input id="new_client_postcode" x-model="clientForm.postcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_address">Address</label>
                        <textarea id="new_client_address" x-model="clientForm.address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="new_client_city">City</label>
                        <input id="new_client_city" x-model="clientForm.city" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200" @click="closeClientModal">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 disabled:opacity-50" :disabled="clientSaving">
                            <span x-show="!clientSaving">Save client</span>
                            <span x-show="clientSaving">Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function projectManager() {
            return {
                clients: @js($clients->map(fn ($client) => ['id' => $client->id, 'name' => $client->name])),
                selectedClient: '',
                showProjectModal: false,
                showClientModal: false,
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
                    this.selectedClient = this.clients[0]?.id ?? '';
                },
                openProjectModal() {
                    this.showProjectModal = true;
                    if (!this.selectedClient && this.clients[0]) {
                        this.selectedClient = this.clients[0].id;
                    }
                },
                closeProjectModal() {
                    this.showProjectModal = false;
                },
                openClientModal() {
                    this.showClientModal = true;
                    this.clientError = '';
                },
                closeClientModal() {
                    this.showClientModal = false;
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
                        this.closeClientModal();
                        this.showProjectModal = true;
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
