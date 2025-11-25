<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Premises type / occupancy</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.general.premises"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="e.g. Domestic dwelling"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Purpose of report</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.general.purpose"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="e.g. Landlord periodic inspection"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Earthing arrangement</label>
            <select
                wire:model="formState.eicr.supply.earthing_arrangement"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">Select</option>
                <option value="TNS">TN-S</option>
                <option value="TNCS">TN-C-S</option>
                <option value="TT">TT</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Nominal voltage U<sub>0</sub> (V)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.nominal_voltage"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="230"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Supply frequency (Hz)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.frequency"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="50"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Distributor device (type & rating)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.distributor_device"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="e.g. 80A BS 1361"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Prospective fault current (kA)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.prospective_fault_current"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="6"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">External earth fault loop impedance Ze (Ω)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.ze"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="0.24"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Main protective bonding conductor size</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.earthing.bonding_size"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="10 mm² copper"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Main earthing conductor size</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.earthing.earthing_size"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="16 mm²"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Supply tails (material & size)</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.supply.tails"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="25 mm² copper"
            >
        </div>
    </div>
</div>
