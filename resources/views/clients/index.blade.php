@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Clients & Projects') }}
                </h2>
            </div>
            <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                {{ __('Add client') }}
            </a>
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
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Clients for your default company') }}</h3>
                            <p class="text-sm text-gray-600">Manage client profiles and the projects/locations you deliver work to.</p>
                        </div>
                        <a href="{{ route('companies.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Change default company</a>
                    </div>

                    @if ($clients->isEmpty())
                        <div class="p-6 border border-dashed border-gray-300 rounded-lg text-center text-gray-600">
                            <p class="text-base font-medium">You have not added any clients yet.</p>
                            <p class="text-sm mt-1">Create your first client to start tracking their locations.</p>
                            <div class="mt-4">
                                <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Add your first client</a>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projects</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($clients as $client)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $client->name }}</div>
                                                <div class="text-xs text-gray-500">Client ID: {{ $client->id }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                @if ($client->contact_name)
                                                    <div class="font-medium">{{ $client->contact_name }}</div>
                                                @endif
                                                @if ($client->email)
                                                    <div class="text-gray-500">{{ $client->email }}</div>
                                                @endif
                                                @if ($client->phone)
                                                    <div class="text-gray-500">{{ $client->phone }}</div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-800">
                                                    {{ $client->projects_count }} {{ Str::plural('project', $client->projects_count) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                @if ($client->address || $client->city || $client->postcode)
                                                    <div>{{ $client->address }}</div>
                                                    <div class="text-gray-500">{{ $client->city }} {{ $client->postcode }}</div>
                                                @else
                                                    <span class="text-gray-400 text-sm">No address provided</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:text-blue-900">Manage</a>
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
</x-app-layout>
