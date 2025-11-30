@php
    $preparedItems = collect(old('items', $initialItems->map(function ($item) {
        return [
            'item_type' => $item->item_type,
            'catalog_item_id' => $item->catalog_item_id,
            'name' => $item->name,
            'description' => $item->description,
            'quantity' => (float) $item->quantity,
            'tax_rate' => (float) $item->tax_rate,
            'unit_price' => (float) $item->unit_price,
        ];
    })->toArray()))->map(function ($item) {
        return [
            'item_type' => $item['item_type'] ?? 'custom',
            'catalog_item_id' => $item['catalog_item_id'] ?? null,
            'name' => $item['name'] ?? '',
            'description' => $item['description'] ?? '',
            'quantity' => (float) ($item['quantity'] ?? 1),
            'tax_rate' => (float) ($item['tax_rate'] ?? 0),
            'unit_price' => (float) ($item['unit_price'] ?? 0),
        ];
    });

    $catalogForJs = $catalogItems->map(function ($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'type' => $item->type,
            'unit_price' => (float) $item->unit_price,
            'description' => $item->description,
        ];
    });
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $estimate->exists ? 'Edit estimate' : 'Create estimate' }}</h2>
            </div>
            <a href="{{ route('estimates.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Back to estimates</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    <p class="font-semibold">We couldn't save the estimate.</p>
                    <ul class="list-disc list-inside text-sm mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ $estimate->exists ? route('estimates.update', $estimate) : route('estimates.store') }}" id="estimate-form" class="space-y-8">
                        @csrf
                        @if ($estimate->exists)
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="client_id">Client</label>
                                <select id="client_id" name="client_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Select a client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @selected(old('client_id', $estimate->client_id) == $client->id)>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="project_id">Project (optional)</label>
                                <select id="project_id" name="project_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">No project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" @selected(old('project_id', $estimate->project_id) == $project->id)>{{ $project->name }} ({{ $project->client->name }})</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="issue_date">Issue date</label>
                                    <input id="issue_date" name="issue_date" type="date" value="{{ old('issue_date', optional($estimate->issue_date)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @error('issue_date')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700" for="due_date">Due date</label>
                                    <input id="due_date" name="due_date" type="date" value="{{ old('due_date', optional($estimate->due_date)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    @error('due_date')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="status">Status</label>
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}" @selected(old('status', $estimate->status ?? 'draft') === $status)>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="notes">Notes</label>
                                <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('notes', $estimate->notes) }}</textarea>
                                @error('notes')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div id="estimate-builder" data-initial-items='@json($preparedItems->values())' data-catalog='@json($catalogForJs)'>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Line items</h3>
                                    <p class="text-sm text-gray-600">Add products, services, or custom charges.</p>
                                </div>
                                <button type="button" id="add-custom" class="px-3 py-2 bg-gray-900 text-white rounded-md shadow hover:bg-gray-800">+ Custom line</button>
                            </div>

                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 space-y-4" id="items-container"></div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Add from products or services</label>
                                        <div class="flex items-center gap-2 mt-1">
                                            <select id="catalog-selector" class="flex-1 rounded-md border-gray-300 shadow-sm">
                                                <option value="">Select an item</option>
                                            </select>
                                            <button type="button" id="add-from-catalog" class="px-3 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Add</button>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded-lg p-4">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Quick add product/service</h4>
                                        <p class="text-sm text-gray-600 mb-3">Create an item without leaving this page. It will be saved for future estimates.</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs font-medium text-gray-700">Type</label>
                                                <select id="quick-type" class="mt-1 w-full rounded-md border-gray-300 shadow-sm">
                                                    <option value="product">Product</option>
                                                    <option value="service">Service</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-gray-700">Unit price</label>
                                                <input id="quick-price" type="number" step="0.01" min="0" value="0" class="mt-1 w-full rounded-md border-gray-300 shadow-sm">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-medium text-gray-700">Name</label>
                                                <input id="quick-name" type="text" class="mt-1 w-full rounded-md border-gray-300 shadow-sm">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-medium text-gray-700">Description (optional)</label>
                                                <textarea id="quick-description" rows="2" class="mt-1 w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between mt-3">
                                            <p id="quick-feedback" class="text-xs text-gray-600"></p>
                                            <button type="button" id="save-quick-item" class="px-3 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700">Save & add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 h-full flex flex-col justify-between">
                                    <div class="space-y-2">
                                        <p class="text-sm text-gray-600">Estimate totals</p>
                                        <div class="flex justify-between text-sm text-gray-700">
                                            <span>Subtotal</span>
                                            <span id="estimate-subtotal">£0.00</span>
                                        </div>
                                        <div class="flex justify-between text-sm text-gray-700">
                                            <span>Tax</span>
                                            <span id="estimate-tax">£0.00</span>
                                        </div>
                                        <div class="border-t border-gray-200 pt-2 flex justify-between text-xl font-bold text-gray-900">
                                            <span>Total</span>
                                            <span id="estimate-total">£0.00</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Totals update automatically as you edit line items.</p>
                                    </div>
                                    <div class="flex justify-end mt-4">
                                        <button type="submit" class="px-5 py-3 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">{{ $estimate->exists ? 'Save changes' : 'Create estimate' }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const builder = document.getElementById('estimate-builder');
        if (!builder) return;

        const catalog = JSON.parse(builder.dataset.catalog || '[]');
        let items = JSON.parse(builder.dataset.initialItems || '[]');

        if (!items.length) {
            items.push({ item_type: 'custom', name: '', description: '', quantity: 1, tax_rate: 0, unit_price: 0, catalog_item_id: null });
        }

        const itemsContainer = document.getElementById('items-container');
        const catalogSelector = document.getElementById('catalog-selector');
        const estimateSubtotal = document.getElementById('estimate-subtotal');
        const estimateTax = document.getElementById('estimate-tax');
        const estimateTotal = document.getElementById('estimate-total');
        const quickFeedback = document.getElementById('quick-feedback');

        function refreshCatalogOptions() {
            catalogSelector.innerHTML = '<option value="">Select an item</option>';
            catalog.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = `${item.name} (${item.type}) - £${Number(item.unit_price).toFixed(2)}`;
                catalogSelector.appendChild(option);
            });
        }

        function lineSubtotal(item) {
            const qty = parseFloat(item.quantity) || 0;
            const price = parseFloat(item.unit_price) || 0;
            return qty * price;
        }

        function lineTax(item) {
            const subtotal = lineSubtotal(item);
            const taxRate = parseFloat(item.tax_rate) || 0;
            return subtotal * (taxRate / 100);
        }

        function renderItems() {
            itemsContainer.innerHTML = '';

            items.forEach((item, index) => {
                const wrapper = document.createElement('div');
                wrapper.dataset.itemRow = 'true';
                wrapper.className = 'bg-white rounded-lg border border-gray-200 p-4 shadow-sm';

                wrapper.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Type</label>
                            <select class="mt-1 w-full rounded-md border-gray-300 shadow-sm" name="items[${index}][item_type]" data-field="item_type">
                                <option value="product" ${item.item_type === 'product' ? 'selected' : ''}>Product</option>
                                <option value="service" ${item.item_type === 'service' ? 'selected' : ''}>Service</option>
                                <option value="custom" ${item.item_type === 'custom' ? 'selected' : ''}>Custom</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium text-gray-700">Name</label>
                            <input type="text" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" name="items[${index}][name]" data-field="name" value="${item.name ?? ''}" required>
                            <input type="hidden" name="items[${index}][catalog_item_id]" data-field="catalog_item_id" value="${item.catalog_item_id ?? ''}">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Quantity</label>
                            <input type="number" step="0.01" min="0" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" name="items[${index}][quantity]" data-field="quantity" value="${item.quantity ?? 1}" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Tax rate (%)</label>
                            <input type="number" step="0.01" min="0" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" name="items[${index}][tax_rate]" data-field="tax_rate" value="${Number(item.tax_rate ?? 0).toFixed(2)}">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Unit price</label>
                            <input type="number" step="0.01" min="0" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" name="items[${index}][unit_price]" data-field="unit_price" value="${Number(item.unit_price ?? 0).toFixed(2)}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 mt-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Description</label>
                            <textarea class="mt-1 w-full rounded-md border-gray-300 shadow-sm" rows="2" name="items[${index}][description]" data-field="description">${item.description ?? ''}</textarea>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <div class="space-y-1">
                                <div data-line-total>Line subtotal: £${lineSubtotal(item).toFixed(2)}</div>
                                <div data-line-tax>Tax: £${lineTax(item).toFixed(2)}</div>
                            </div>
                            <button type="button" class="text-red-600 hover:text-red-800" data-remove="${index}">Remove</button>
                        </div>
                    </div>
                `;

                itemsContainer.appendChild(wrapper);
            });

            updateTotals();
        }

        function updateTotals() {
            let subtotal = 0;
            let taxTotal = 0;
            itemsContainer.querySelectorAll('[data-item-row]').forEach((row, index) => {
                const quantity = parseFloat(row.querySelector('[data-field="quantity"]').value) || 0;
                const price = parseFloat(row.querySelector('[data-field="unit_price"]').value) || 0;
                const name = row.querySelector('[data-field="name"]').value || '';
                const description = row.querySelector('[data-field="description"]').value || '';
                const type = row.querySelector('[data-field="item_type"]').value || 'custom';
                const catalogId = row.querySelector('[data-field="catalog_item_id"]').value || null;
                const taxRate = parseFloat(row.querySelector('[data-field="tax_rate"]').value) || 0;

                items[index] = { item_type: type, catalog_item_id: catalogId, name, description, quantity, tax_rate: taxRate, unit_price: price };

                const rowSubtotal = quantity * price;
                const rowTax = rowSubtotal * (taxRate / 100);
                subtotal += rowSubtotal;
                taxTotal += rowTax;
                const totalLabel = row.querySelector('[data-line-total]');
                if (totalLabel) {
                    totalLabel.textContent = `Line subtotal: £${rowSubtotal.toFixed(2)}`;
                }
                const taxLabel = row.querySelector('[data-line-tax]');
                if (taxLabel) {
                    taxLabel.textContent = `Tax: £${rowTax.toFixed(2)}`;
                }
            });

            estimateSubtotal.textContent = `£${subtotal.toFixed(2)}`;
            estimateTax.textContent = `£${taxTotal.toFixed(2)}`;
            estimateTotal.textContent = `£${(subtotal + taxTotal).toFixed(2)}`;
        }

        function addCatalogItemToEstimate(itemId) {
            const selected = catalog.find(entry => String(entry.id) === String(itemId));
            if (!selected) return;

            items.push({
                item_type: selected.type,
                catalog_item_id: selected.id,
                name: selected.name,
                description: selected.description || '',
                quantity: 1,
                tax_rate: 0,
                unit_price: selected.unit_price || 0,
            });
            renderItems();
        }

        document.getElementById('add-from-catalog').addEventListener('click', () => {
            const selectedId = catalogSelector.value;
            if (!selectedId) return;
            addCatalogItemToEstimate(selectedId);
            catalogSelector.value = '';
        });

        document.getElementById('add-custom').addEventListener('click', () => {
            items.push({ item_type: 'custom', name: '', description: '', quantity: 1, tax_rate: 0, unit_price: 0, catalog_item_id: null });
            renderItems();
        });

        itemsContainer.addEventListener('input', (event) => {
            if (event.target.closest('[data-item-row]')) {
                updateTotals();
            }
        });

        itemsContainer.addEventListener('click', (event) => {
            const removeButton = event.target.closest('[data-remove]');
            if (!removeButton) return;
            const index = parseInt(removeButton.dataset.remove, 10);
            items.splice(index, 1);
            if (!items.length) {
                items.push({ item_type: 'custom', name: '', description: '', quantity: 1, tax_rate: 0, unit_price: 0, catalog_item_id: null });
            }
            renderItems();
        });

        document.getElementById('save-quick-item').addEventListener('click', async () => {
            const nameInput = document.getElementById('quick-name');
            const typeInput = document.getElementById('quick-type');
            const priceInput = document.getElementById('quick-price');
            const descriptionInput = document.getElementById('quick-description');
            quickFeedback.textContent = 'Saving item...';

            try {
                const response = await fetch('{{ route('catalog-items.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        name: nameInput.value,
                        type: typeInput.value,
                        unit_price: priceInput.value,
                        description: descriptionInput.value,
                    })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    quickFeedback.textContent = errorData.message || 'Could not save item.';
                    quickFeedback.className = 'text-xs text-red-600';
                    return;
                }

                const data = await response.json();
                catalog.push(data.item);
                refreshCatalogOptions();
                addCatalogItemToEstimate(data.item.id);

                nameInput.value = '';
                descriptionInput.value = '';
                priceInput.value = '0';

                quickFeedback.textContent = 'Saved and added to estimate.';
                quickFeedback.className = 'text-xs text-green-600';
            } catch (error) {
                quickFeedback.textContent = 'Network error while saving item.';
                quickFeedback.className = 'text-xs text-red-600';
            }
        });

        refreshCatalogOptions();
        renderItems();
    });
</script>
