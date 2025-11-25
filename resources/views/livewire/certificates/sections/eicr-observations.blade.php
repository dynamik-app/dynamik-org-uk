@php($rows = range(0, 4))

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-md font-semibold text-gray-900">Observations and recommendations</h3>
            <p class="text-sm text-gray-600">Record non-compliances with BS 7671 using C1, C2, C3 or FI coding and recommended action.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Item / Observation</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Code</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Recommended action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($rows as $index)
                    <tr>
                        <td class="px-3 py-2 text-sm">
                            <textarea
                                wire:model.lazy="formState.eicr.observations.{{ $index }}.item"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                rows="2"
                                placeholder="Describe the issue"
                            ></textarea>
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <select
                                wire:model="formState.eicr.observations.{{ $index }}.code"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Select</option>
                                <option value="C1">C1 - Danger present</option>
                                <option value="C2">C2 - Potentially dangerous</option>
                                <option value="C3">C3 - Improvement recommended</option>
                                <option value="FI">FI - Further investigation required</option>
                            </select>
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <textarea
                                wire:model.lazy="formState.eicr.observations.{{ $index }}.recommendation"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                rows="2"
                                placeholder="Corrective action and target date"
                            ></textarea>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
