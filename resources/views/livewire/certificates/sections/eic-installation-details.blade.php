<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Installation address</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.installation.address"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Site address"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Installation description/purpose</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.installation.purpose"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="e.g. New lighting and power circuits"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Earthing arrangement</label>
            <select
                wire:model="formState.eic.supply.earthing_arrangement"
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
            <label class="block text-sm font-medium text-gray-700">Number of phases</label>
            <select
                wire:model="formState.eic.supply.phases"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">Select</option>
                <option value="single">Single-phase</option>
                <option value="three">Three-phase</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Nominal voltage U<sub>0</sub> (V)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.nominal_voltage"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="230"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Overcurrent protective device (type/rating)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.overcurrent_device"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="e.g. 100A BS 88-3 fuse"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Prospective fault current (kA)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.prospective_fault_current"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="6"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">External earth fault loop impedance Ze (Ω)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.ze"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="0.18"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Maximum demand (A)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.maximum_demand"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="63"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Main switch / device</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.main_switch"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="100A DP switch disconnector"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Main switch rating (A)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.supply.main_switch_rating"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="100"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Main protective bonding conductor size (water/gas/etc.)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.bonding.protective_conductor_size"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="10 mm² copper"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Main earthing conductor size (mm²)</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.bonding.earthing_conductor_size"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="16"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Circuit protective measure</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.bonding.protective_measure"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="ADS with 30mA RCDs"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Designer</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.responsible.designer"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Name"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Installer</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.responsible.installer"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Name"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Inspector/Tester</label>
            <input
                type="text"
                wire:model.lazy="formState.eic.responsible.inspector"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Name"
            >
        </div>
    </div>
</div>
