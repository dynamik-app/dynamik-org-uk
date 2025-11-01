<div class="max-w-5xl mx-auto py-10 space-y-8">
    @if (session('status'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
            <p class="font-semibold">{{ session('status') }}</p>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">
            {{ $editingId ? __('Edit Category') : __('Create Category') }}
        </h2>

        <form wire:submit="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                <textarea wire:model.defer="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <x-button class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                    {{ $editingId ? __('Update') : __('Create') }}
                </x-button>
                @if ($editingId)
                    <x-secondary-button type="button" wire:click="cancelEdit">{{ __('Cancel') }}</x-secondary-button>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-900">{{ __('Existing Categories') }}</h2>
        </div>

        <div class="border-t border-gray-200">
            @if ($categories->isEmpty())
                <p class="p-6 text-gray-600">{{ __('No categories found. Create one to get started.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Slug') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Description') }}</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->slug }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $category->description ?: __('No description provided') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <x-secondary-button type="button" wire:click="edit({{ $category->id }})">{{ __('Edit') }}</x-secondary-button>
                                        <x-danger-button type="button" wire:click="delete({{ $category->id }})" wire:confirm="{{ __('Delete this category?') }}">{{ __('Delete') }}</x-danger-button>
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
