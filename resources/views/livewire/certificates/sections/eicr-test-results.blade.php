@php($rows = range(0, 5))

<div class="space-y-4">
    <div>
        <h3 class="text-md font-semibold text-gray-900">Sampled circuit test results</h3>
        <p class="text-sm text-gray-600">Capture continuity, insulation resistance, polarity and Zs readings taken during the condition report.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Ref</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Description</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Protective device</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Conductor size</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Continuity R1+R2 / R2 (Ω)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">IR results (MΩ)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Polarity</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Measured Zs (Ω)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($rows as $index)
                    <tr>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.reference"
                                class="block w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="C{{ $index + 1 }}"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.description"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Circuit description"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.protective_device"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="e.g. B32 MCB"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.conductor_size"
                                class="block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="2.5/1.5mm²"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.continuity"
                                class="block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="0.80"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.ir_results"
                                class="block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder=">200 MΩ L/N/E"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <select
                                wire:model="formState.eicr.tests.{{ $index }}.polarity"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Select</option>
                                <option value="satisfactory">Satisfactory</option>
                                <option value="unsatisfactory">Unsatisfactory</option>
                            </select>
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eicr.tests.{{ $index }}.measured_zs"
                                class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="0.52"
                            >
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
