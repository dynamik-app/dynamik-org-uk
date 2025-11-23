<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accept Company Invitation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Enter your invitation token</h3>
                    <p class="text-sm text-gray-600 mb-6">Paste the token you received in your email to join the company as a manager.</p>

                    <form method="POST" action="{{ route('companies.invitations.accept.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="token">Invitation token</label>
                            <input id="token" name="token" type="text" required
                                   value="{{ old('token', $token) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                            @error('token')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('dashboard') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200">Cancel</a>
                            <x-primary-button>
                                Accept invitation
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
