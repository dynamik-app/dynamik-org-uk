<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Extent of installation covered</label>
            <textarea
                wire:model.lazy="formState.eicr.inspection.extent"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                rows="3"
                placeholder="E.g. Main dwelling including consumer unit CU1 and final circuits"
            ></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Agreed limitations</label>
            <textarea
                wire:model.lazy="formState.eicr.inspection.limitations"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                rows="3"
                placeholder="Areas not inspected or tested"
            ></textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Supply status during inspection</label>
            <select
                wire:model="formState.eicr.inspection.supply_status"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">Select</option>
                <option value="energised">Energised</option>
                <option value="de-energised">De-energised</option>
                <option value="partially-energised">Partially energised</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Overall assessment</label>
            <select
                wire:model="formState.eicr.inspection.assessment"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">Select</option>
                <option value="satisfactory">Satisfactory</option>
                <option value="unsatisfactory">Unsatisfactory</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Recommended next inspection</label>
            <div class="flex space-x-2">
                <input
                    type="text"
                    wire:model.lazy="formState.eicr.inspection.next_interval"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="5"
                >
                <select
                    wire:model="formState.eicr.inspection.next_units"
                    class="mt-1 block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                    <option value="years">Years</option>
                    <option value="months">Months</option>
                </select>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Inspector name</label>
            <input
                type="text"
                wire:model.lazy="formState.eicr.inspection.inspector"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Name"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Report date</label>
            <input
                type="date"
                wire:model="formState.eicr.inspection.date"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>
    </div>
</div>
