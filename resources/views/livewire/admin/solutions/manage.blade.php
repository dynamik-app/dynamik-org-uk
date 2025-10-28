<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $solution->exists ? 'Edit Solution' : 'Create Solution' }}
            </h2>
            <a href="{{ route('admin.solutions.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                &larr; Back to Solutions
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

                <form wire:submit.prevent="save">
                    <div class="space-y-6">
                        {{-- Solution Name --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Solution Name</label>
                            <input type="text" wire:model.lazy="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700">URL Slug</label>
                            <input type="text" wire:model="slug" id="slug" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Short Description (Summary)</label>
                            <textarea wire:model.lazy="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Trix Editor for Main Content --}}
                        <div
                                class="mb-4"
                                wire:ignore
                                x-data="{
        content: @entangle('content'),

        // Function to upload a file to the Livewire component
        upload(file) {
            @this.upload('uploadedFile', file, (uploadedFilename) => {
                // Success callback...
            }, () => {
                // Error callback...
                alert('File could not be uploaded');
            }, (event) => {
                // Progress callback...
            });
        }
    }"

                                {{-- Listen for the browser event dispatched from the backend --}}
                                @trix-upload-completed.window="$dispatch('trix-file-accept', { url: $event.detail.url });"

                                x-init="
        // Get the Trix editor element
        let trix = $refs.trix;

        // Load initial content
        trix.editor.loadHTML(content || '');

        // Listen for the trix-attachment-add event
        trix.addEventListener('trix-attachment-add', (event) => {
            upload(event.attachment.file);
        });

        // This is a custom event that Trix fires when it receives a URL
        trix.addEventListener('trix-file-accept', (event) => {
            // Find the placeholder attachment
            const attachment = document.querySelector('trix-editor').editor.getDocument().getAttachments().find(a => a.file.name === event.detail.file.name);

            // Set the final URL
            attachment.setAttributes({
                url: event.detail.url,
                href: event.detail.url
            });
        });
    "
                        >
                            <label for="content" class="block text-sm font-medium text-gray-700">Main Page Content</label>
                            <input id="content" type="hidden" name="content">
                            <trix-editor x-ref="trix" input="content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm prose max-w-none"></trix-editor>
                            @error('content') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        {{-- Publish Toggle --}}
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="is_published" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">Publish this solution</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-5">
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Solution</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
