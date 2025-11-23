<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invite a Company Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Send an invitation</h3>

                    @if($companies->isEmpty())
                        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-md text-sm text-yellow-800">
                            You need to create a company before you can invite managers.
                        </div>
                    @else
                        <form method="POST" action="{{ route('companies.invitations.store') }}" class="space-y-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="company_id">Company</label>
                                <select id="company_id" name="company_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>
                                            {{ $company->registered_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="email">Invitee email</label>
                                <input id="email" name="email" type="email" required
                                       value="{{ old('email') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('email')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="role">Role</label>
                                <input id="role" name="role" type="text" required
                                       value="{{ old('role', 'manager') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('role')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <a href="{{ route('dashboard') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200">Cancel</a>
                                <x-primary-button>
                                    Send invitation
                                </x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
