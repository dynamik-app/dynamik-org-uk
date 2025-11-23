<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $client->exists ? 'Edit client' : 'Add client' }}
                </h2>
            </div>
            <a href="{{ route('clients.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Back to clients</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Client details</h3>
                    <form method="POST" action="{{ $client->exists ? route('clients.update', $client) : route('clients.store') }}" class="space-y-6">
                        @csrf
                        @if ($client->exists)
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="name">Client name</label>
                                <input id="name" name="name" type="text" value="{{ old('name', $client->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="contact_name">Primary contact</label>
                                <input id="contact_name" name="contact_name" type="text" value="{{ old('contact_name', $client->contact_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('contact_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email', $client->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('email')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="phone">Phone</label>
                                <input id="phone" name="phone" type="text" value="{{ old('phone', $client->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('phone')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700" for="address">Address</label>
                                <textarea id="address" name="address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('address', $client->address) }}</textarea>
                                @error('address')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                                <input id="city" name="city" type="text" value="{{ old('city', $client->city) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('city')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="postcode">Postcode</label>
                                <input id="postcode" name="postcode" type="text" value="{{ old('postcode', $client->postcode) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('postcode')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                                {{ $client->exists ? 'Save changes' : 'Create client' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Projects / locations</h3>
                            <p class="text-sm text-gray-600">Track the sites you deliver work to for this client.</p>
                        </div>
                        @if (! $client->exists)
                            <span class="text-sm text-gray-500">Save the client to add projects.</span>
                        @endif
                    </div>

                    @if ($client->exists)
                        <form method="POST" action="{{ route('clients.projects.store', $client) }}" class="space-y-4 mb-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="project_name">Project / location name</label>
                                    <input id="project_name" name="project_name" type="text" value="{{ old('project_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @error('project_name')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="project_postcode">Postcode</label>
                                    <input id="project_postcode" name="project_postcode" type="text" value="{{ old('project_postcode') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    @error('project_postcode')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="project_address">Address</label>
                                    <textarea id="project_address" name="project_address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('project_address') }}</textarea>
                                    @error('project_address')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="project_city">City</label>
                                    <input id="project_city" name="project_city" type="text" value="{{ old('project_city') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    @error('project_city')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700" for="project_notes">Notes</label>
                                    <textarea id="project_notes" name="project_notes" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('project_notes') }}</textarea>
                                    @error('project_notes')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Add project</button>
                            </div>
                        </form>

                        <div class="space-y-4">
                            @forelse ($client->projects as $project)
                                <div class="p-4 border border-gray-200 rounded-lg">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h4 class="text-base font-semibold text-gray-900">{{ $project->name }}</h4>
                                            <div class="text-sm text-gray-700">
                                                @if ($project->address)
                                                    <div>{{ $project->address }}</div>
                                                @endif
                                                @if ($project->city || $project->postcode)
                                                    <div class="text-gray-500">{{ $project->city }} {{ $project->postcode }}</div>
                                                @endif
                                                @if ($project->notes)
                                                    <div class="text-gray-600 mt-2">{{ $project->notes }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('projects.destroy', $project) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:text-red-800">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-600">No projects added yet.</p>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
