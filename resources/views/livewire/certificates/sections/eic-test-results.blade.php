@php($rows = range(0, 5))

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-md font-semibold text-gray-900">Circuit verification</h3>
            <p class="text-sm text-gray-600">Record continuity, insulation resistance and RCD checks as required by BS 7671 initial verification.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Ref</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Description</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Protective device</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Conductor size</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">R1+R2 / R2 (Ω)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">IR L-N (MΩ)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">IR L-E (MΩ)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Polarity proved</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Zs (Ω)</th>
                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">RCD trip @ IΔn (ms)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($rows as $index)
                    <tr>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.reference"
                                class="block w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="C{{ $index + 1 }}"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.description"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Circuit description"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.protective_device"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="e.g. B32 MCB"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.conductor_size"
                                class="block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="2.5/1.5mm²"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.r1_r2"
                                class="block w-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="0.67"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.ir_ln"
                                class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder=">200"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.ir_le"
                                class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder=">200"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <select
                                wire:model="formState.eic.tests.{{ $index }}.polarity"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Select</option>
                                <option value="proved">Proved</option>
                                <option value="not-proved">Not verified</option>
                            </select>
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.zs"
                                class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="0.48"
                            >
                        </td>
                        <td class="px-3 py-2 text-sm">
                            <input
                                type="text"
                                wire:model.lazy="formState.eic.tests.{{ $index }}.rcd_trip"
                                class="block w-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="<40"
                            >
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
