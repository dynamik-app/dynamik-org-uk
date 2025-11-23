<div x-data="{ tab: 'installation' }" class="space-y-6">
    <div class="flex flex-wrap gap-2 border-b border-gray-200">
        <button
            type="button"
            class="px-4 py-2 text-sm font-medium"
            :class="tab === 'installation' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
            @click="tab = 'installation'"
        >
            Installation Details
        </button>
        <button
            type="button"
            class="px-4 py-2 text-sm font-medium"
            :class="tab === 'schedule' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
            @click="tab = 'schedule'"
        >
            Schedule of Circuits
        </button>
        <button
            type="button"
            class="px-4 py-2 text-sm font-medium"
            :class="tab === 'observations' ? 'border-b-2 border-indigo-500 text-indigo-600' : 'text-gray-600 hover:text-gray-900'"
            @click="tab = 'observations'"
        >
            Observations
        </button>
    </div>

    <div x-show="tab === 'installation'" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Installation Address</label>
                <input
                    type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Address"
                    wire:model.lazy="installation.address"
                />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Client</label>
                <input
                    type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Client name"
                    wire:model.lazy="installation.client"
                />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Earthing Arrangement</label>
                <input
                    type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="e.g. TN-S, TN-C-S"
                    wire:model.lazy="installation.earthing"
                />
            </div>
        </div>
    </div>

    <div x-show="tab === 'schedule'" class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Distribution Boards</h3>
                <p class="text-sm text-gray-600">Add boards and circuits to mirror the CertSuite schedule grid.</p>
            </div>
            <button
                type="button"
                wire:click="addBoard"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Add new board
            </button>
        </div>

        <div class="space-y-6">
            @foreach($boards as $boardIndex => $board)
                <div class="border rounded-lg shadow-sm" wire:key="board-{{ $boardIndex }}">
                    <div class="flex items-start justify-between border-b px-4 py-3 bg-gray-50">
                        <div class="space-y-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Board name</label>
                                    <input
                                        type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="DB1"
                                        wire:model.lazy="boards.{{ $boardIndex }}.name"
                                    />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Location</label>
                                    <input
                                        type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="Plant room"
                                        wire:model.lazy="boards.{{ $boardIndex }}.location"
                                    />
                                </div>
                            </div>
                        </div>
                        <button
                            type="button"
                            wire:click="removeBoard({{ $boardIndex }})"
                            class="text-sm text-red-600 hover:text-red-800"
                        >
                            Remove board
                        </button>
                    </div>

                    <div class="p-4 space-y-4">
                        <div class="flex items-center justify-between">
                            <h4 class="text-md font-semibold">Circuits</h4>
                            <button
                                type="button"
                                wire:click="addCircuit({{ $boardIndex }})"
                                class="inline-flex items-center px-3 py-2 bg-gray-900 text-white text-sm font-medium rounded-md shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                            >
                                Add circuit
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Ref</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Description</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Protective Device</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Rating (A)</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Cable Size</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">r1 (Ω)</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">rn (Ω)</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">r2 (Ω)</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Insulation Resistance</th>
                                        <th class="px-3 py-2 text-left text-xs font-semibold text-gray-600">Measured Zs</th>
                                        <th class="px-3 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($board['circuits'] as $circuitIndex => $circuit)
                                        <tr wire:key="board-{{ $boardIndex }}-circuit-{{ $circuitIndex }}">
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.circuit_ref"
                                                    placeholder="1"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.description"
                                                    placeholder="Lighting"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.protective_device"
                                                    placeholder="Type B"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.rating"
                                                    placeholder="32A"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.cable_size"
                                                    placeholder="2.5mm²"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.r1"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.rn"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.r2"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.insulation_resistance"
                                                    placeholder=">200 MΩ"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-sm text-gray-900">
                                                <input
                                                    type="text"
                                                    class="block w-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    wire:model.lazy="boards.{{ $boardIndex }}.circuits.{{ $circuitIndex }}.measured_zs"
                                                    placeholder="0.64"
                                                />
                                            </td>
                                            <td class="px-3 py-2 text-right">
                                                <button
                                                    type="button"
                                                    wire:click="removeCircuit({{ $boardIndex }}, {{ $circuitIndex }})"
                                                    class="text-xs text-red-600 hover:text-red-800"
                                                >
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div x-show="tab === 'observations'" class="space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Observations</h3>
            <button
                type="button"
                wire:click="addObservation"
                class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Add observation
            </button>
        </div>

        <div class="space-y-4">
            @foreach($observations as $index => $observation)
                <div class="p-4 border rounded-lg space-y-3 bg-white" wire:key="observation-{{ $index }}">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Observation / Defect</label>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Describe the issue"
                                wire:model.lazy="observations.{{ $index }}.note"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Code</label>
                            <select
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                wire:model="observations.{{ $index }}.code"
                            >
                                <option value="">Select</option>
                                <option value="C1">C1 - Danger Present</option>
                                <option value="C2">C2 - Potentially Dangerous</option>
                                <option value="C3">C3 - Improvement Recommended</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="button"
                            wire:click="removeObservation({{ $index }})"
                            class="text-sm text-red-600 hover:text-red-800"
                        >
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
