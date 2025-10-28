<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Solutions') }}
            </h2>
            <a href="{{ route('admin.solutions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">
                Add New Solution
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <h3 class="text-xl font-bold mb-4">All Solutions</h3>
                <div class="border-t border-gray-200">
                    @forelse($solutions as $solution)
                        <div class="flex justify-between items-center py-3 border-b">
                            <div>
                                <p class="font-semibold">{{ $solution->name }}</p>
                                <p class="text-sm text-gray-600">{{ $solution->description }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                @if ($solution->is_published)
                                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Published</span>
                                @else
                                    <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold leading-5 text-gray-800">Draft</span>
                                @endif
                                <div class="space-x-2">
                                    <a href="{{ route('admin.solutions.edit', $solution) }}" class="text-blue-600 hover:text-blue-900">Manage</a>
                                    <button wire:click="deleteSolution({{ $solution->id }})" wire:confirm="Are you sure?" class="text-red-600 hover:text-red-900">Delete</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 pt-4">No solutions have been added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
