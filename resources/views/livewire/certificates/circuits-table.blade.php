<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold">Circuits</h3>
        <button
            type="button"
            wire:click="addCircuit"
            class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add circuit
        </button>
    </div>

    <div class="border rounded-lg divide-y">
        @foreach($circuits as $index => $circuit)
            <div class="p-4" wire:key="circuit-{{ $index }}">
                <div
                    x-data="{
                        rating: @entangle('circuits.' . $index . '.rating').defer,
                        rcdTripTime: @entangle('circuits.' . $index . '.rcd_trip_time').defer,
                        measuredZs: @entangle('circuits.' . $index . '.measured_zs').defer,
                        maxZs: 0,
                        recalc() {
                            const ratingNum = parseFloat(this.rating) || 0;
                            const tripNum = parseFloat(this.rcdTripTime) || 1;
                            this.maxZs = ratingNum > 0 ? parseFloat((ratingNum * 0.8) / tripNum).toFixed(2) : 0;
                        },
                        get isValid() {
                            if (!this.measuredZs || !this.maxZs) return true;
                            return parseFloat(this.measuredZs) <= parseFloat(this.maxZs);
                        }
                    }"
                    x-init="recalc()"
                    x-effect="recalc()"
                    class="space-y-3"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                wire:model.lazy="circuits.{{ $index }}.description"
                                placeholder="e.g. Lighting Circuit"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type of Wiring</label>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                wire:model.lazy="circuits.{{ $index }}.type_of_wiring"
                                placeholder="e.g. T&E"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Rating (A)</label>
                            <input
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                wire:model.lazy="circuits.{{ $index }}.rating"
                                x-model="rating"
                                placeholder="e.g. 32"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">RCD Trip time (s)</label>
                            <input
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                wire:model.lazy="circuits.{{ $index }}.rcd_trip_time"
                                x-model="rcdTripTime"
                                placeholder="e.g. 0.04"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Measured Zs (Ω)</label>
                            <input
                                type="number"
                                step="0.01"
                                x-model="measuredZs"
                                wire:model.lazy="circuits.{{ $index }}.measured_zs"
                                class="mt-1 block w-full rounded-md border text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :class="isValid ? 'border-gray-300' : 'border-red-500 ring-red-200'"
                                placeholder="e.g. 0.68"
                            />
                            <p class="mt-1 text-sm" :class="isValid ? 'text-gray-500' : 'text-red-600'">
                                <span x-show="maxZs">Max Zs: <strong x-text="maxZs"></strong> Ω</span>
                                <span x-show="!maxZs">Enter rating to calculate Max Zs.</span>
                                <span x-show="!isValid" class="block">Measured Zs exceeds Max Zs.</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="button"
                            wire:click="removeCircuit({{ $index }})"
                            class="inline-flex items-center px-2 py-1 text-sm text-red-700 bg-red-100 rounded hover:bg-red-200"
                        >
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
