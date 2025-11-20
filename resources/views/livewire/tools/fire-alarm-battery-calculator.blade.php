<div class="space-y-6" wire:ignore.self>
    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label for="standbyCurrent" class="block text-sm font-medium text-gray-700">{{ __('Total standby load (mA)') }}</label>
            <input id="standbyCurrent" type="number" min="0" step="1" wire:model.live.debounce.400ms="standbyCurrent" class="mt-1 block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" />
            @error('standbyCurrent') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="standbyHours" class="block text-sm font-medium text-gray-700">{{ __('Standby duration (hours)') }}</label>
            <input id="standbyHours" type="number" min="0" step="0.5" wire:model.live.debounce.400ms="standbyHours" class="mt-1 block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" />
            @error('standbyHours') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label for="alarmCurrent" class="block text-sm font-medium text-gray-700">{{ __('Total alarm load (mA)') }}</label>
            <input id="alarmCurrent" type="number" min="0" step="1" wire:model.live.debounce.400ms="alarmCurrent" class="mt-1 block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" />
            @error('alarmCurrent') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="alarmMinutes" class="block text-sm font-medium text-gray-700">{{ __('Alarm duration (minutes)') }}</label>
            <input id="alarmMinutes" type="number" min="0" step="1" wire:model.live.debounce.400ms="alarmMinutes" class="mt-1 block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" />
            @error('alarmMinutes') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label for="deratingFactor" class="block text-sm font-medium text-gray-700">{{ __('Derating factor') }}</label>
            <p class="text-xs text-gray-500">{{ __('Accounts for temperature, ageing, and environmental factors. Commonly 0.8 (80%).') }}</p>
            <input id="deratingFactor" type="number" min="0.1" max="1" step="0.05" wire:model.live.debounce.400ms="deratingFactor" class="mt-1 block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" />
            @error('deratingFactor') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="rounded-lg bg-indigo-50 p-4 border border-indigo-100">
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-700">{{ __('Standby & alarm breakdown') }}</p>
            <dl class="mt-2 grid grid-cols-2 gap-2 text-sm text-indigo-900">
                <div>
                    <dt class="text-indigo-700">{{ __('Standby load') }}</dt>
                    <dd class="font-semibold">{{ number_format($standbyLoadAh, 2) }} Ah</dd>
                </div>
                <div>
                    <dt class="text-indigo-700">{{ __('Alarm load') }}</dt>
                    <dd class="font-semibold">{{ number_format($alarmLoadAh, 2) }} Ah</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
            <p class="text-xs font-semibold uppercase tracking-wide text-gray-600">{{ __('Required capacity') }}</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ number_format($requiredAh, 2) }} Ah</p>
            <p class="mt-1 text-sm text-gray-600">{{ __('Calculated from standby + alarm demand, adjusted by your derating factor.') }}</p>
        </div>
        <div class="rounded-lg border border-indigo-100 bg-white p-4 shadow-inner">
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-700">{{ __('Recommended battery size') }}</p>
            <p class="mt-2 text-3xl font-bold text-indigo-900">{{ number_format($recommendedBattery, 1) }} Ah</p>
            <p class="mt-1 text-sm text-indigo-800">{{ __('Rounded to the next standard capacity so your panel stays compliant under load.') }}</p>
        </div>
    </div>
</div>
