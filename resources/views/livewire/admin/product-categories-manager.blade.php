<div class="py-12" x-data="{ open: @entangle('showForm') }">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                <p class="font-semibold">{{ session('status') }}</p>
            </div>
        @endif

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ __('Product Categories') }}</h2>
                    <p class="text-sm text-gray-500">{{ __('Manage the categories used to organize your products.') }}</p>
                </div>

                <x-button type="button" wire:click="openCreateForm" class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                    {{ __('New Category') }}
                </x-button>
            </div>

            <div class="divide-y divide-gray-200">
                @if ($categories->isEmpty())
                    <p class="px-6 py-10 text-center text-gray-600">{{ __('No categories found. Create one to get started.') }}</p>
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

    <div
        x-cloak
        x-show="open"
        class="fixed inset-0 z-40 flex"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        wire:keydown.escape.window="closeForm"
    >
        <div class="absolute inset-0 bg-gray-900/50" aria-hidden="true" @click="open = false; $wire.closeForm()"></div>

        <div
            class="relative ml-auto flex h-full w-full max-w-md flex-col bg-white shadow-xl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $editingId ? __('Edit Category') : __('New Category') }}</h3>
                    <p class="text-sm text-gray-500">{{ $editingId ? __('Update the category details.') : __('Create a new category for your catalog.') }}</p>
                </div>

                <button type="button" class="text-gray-400 hover:text-gray-600" @click="open = false; $wire.closeForm()">
                    <span class="sr-only">{{ __('Close') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="save" class="flex-1 overflow-y-auto px-6 py-6 space-y-5">
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

                <div class="flex items-center justify-end space-x-3">
                    <x-secondary-button type="button" @click="open = false; $wire.closeForm()">{{ __('Cancel') }}</x-secondary-button>
                    <x-button class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700" wire:loading.attr="disabled">
                        <span wire:loading.remove>{{ $editingId ? __('Update Category') : __('Create Category') }}</span>
                        <span wire:loading>{{ __('Saving...') }}</span>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
