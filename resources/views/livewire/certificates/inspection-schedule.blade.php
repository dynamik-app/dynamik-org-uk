<div class="space-y-4">
    @foreach ($groups as $group)
        <div
            x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }"
            class="rounded-xl border border-gray-200 bg-white shadow-sm"
        >
            <div
                class="flex items-center justify-between px-4 py-3 cursor-pointer"
                @click="open = !open"
            >
                <div class="space-y-1">
                    <h3 class="text-base font-semibold text-gray-900">{{ $loop->iteration }}. {{ $group->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $group->items->count() }} inspection item(s)</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        type="button"
                        class="inline-flex items-center rounded-lg bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
                        wire:click.stop="markGroupAs({{ $group->id }}, 'Pass')"
                    >
                        Mark all as Pass
                    </button>
                    <svg
                        x-bind:class="open ? 'rotate-180' : ''"
                        class="h-5 w-5 text-gray-500 transition-transform"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </div>
            <div x-cloak x-show="open" x-transition class="border-t border-gray-200">
                <div class="divide-y divide-gray-200">
                    @foreach ($group->items as $item)
                        @php($currentResult = $inspectionResults[$item->id] ?? '')
                        <div
                            x-data="{
                                showObservation: {{ in_array($currentResult, ['C1', 'C2', 'C3']) ? 'true' : 'false' }},
                                handleChange(value) {
                                    this.showObservation = ['C1', 'C2', 'C3'].includes(value);
                                    if (this.showObservation) {
                                        this.$nextTick(() => this.$refs['observation-{{ $item->id }}']?.focus());
                                    }
                                }
                            }"
                            x-on:show-observation-field.window="if ($event.detail.itemId === {{ $item->id }}) { showObservation = true; $nextTick(() => $refs['observation-{{ $item->id }}']?.focus()); }"
                            x-on:observation-saved.window="if ($event.detail.itemId === {{ $item->id }}) { showObservation = false; }"
                            class="px-4 py-3 space-y-3"
                        >
                            <div class="grid gap-4 md:grid-cols-3 md:items-center">
                                <div class="md:col-span-2 space-y-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $loop->parent->iteration }}.{{ $loop->iteration }} {{ $item->text }}</p>
                                    @if ($item->regulation_ref)
                                        <p class="text-xs text-gray-600">Regulation: {{ $item->regulation_ref }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center md:justify-end">
                                    <label class="sr-only" for="inspection-{{ $item->id }}">Result</label>
                                    <select
                                        id="inspection-{{ $item->id }}"
                                        class="block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 md:w-48"
                                        wire:change="updatedResult({{ $item->id }}, $event.target.value)"
                                        x-on:change="handleChange($event.target.value)"
                                    >
                                        <option value="">Select result</option>
                                        @foreach ($resultOptions as $result)
                                            <option value="{{ $result }}" @selected(($inspectionResults[$item->id] ?? '') === $result)>
                                                {{ $result }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div
                                x-cloak
                                x-show="showObservation"
                                x-transition
                                class="rounded-lg border border-orange-200 bg-orange-50 p-4"
                            >
                                <div class="flex items-start justify-between">
                                    <div class="space-y-1">
                                        <h4 class="text-sm font-semibold text-orange-900">Observation Details</h4>
                                        <p class="text-xs text-orange-800">Provide details for this observation as required by BS 7671.</p>
                                    </div>
                                </div>
                                <div class="mt-3 space-y-3">
                                    <label class="block text-sm font-medium text-orange-900" for="observation-{{ $item->id }}">Observation details</label>
                                    <textarea
                                        id="observation-{{ $item->id }}"
                                        x-ref="observation-{{ $item->id }}"
                                        rows="3"
                                        class="block w-full rounded-md border-orange-200 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                                        placeholder="Describe the observation"
                                        wire:model.lazy="observationNotes.{{ $item->id }}"
                                    ></textarea>
                                    @error('observationNotes.' . $item->id)
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <div class="flex items-center justify-end space-x-3">
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-md border border-orange-200 bg-white px-3 py-2 text-sm font-medium text-orange-900 shadow-sm hover:bg-orange-100"
                                            x-on:click="showObservation = false"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500"
                                            wire:click="saveObservation({{ $item->id }})"
                                        >
                                            Save observation
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
