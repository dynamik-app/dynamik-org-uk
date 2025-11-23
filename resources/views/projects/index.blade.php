<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Projects') }}</h2>
            </div>
            <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                {{ __('Add Project') }}
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
                                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Add your first project</a>
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
</x-app-layout>
