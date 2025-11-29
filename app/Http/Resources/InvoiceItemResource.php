<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'catalog_item_id' => $this->catalog_item_id,
            'item_type' => $this->item_type,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => (float) $this->quantity,
            'tax_rate' => (float) $this->tax_rate,
            'unit_price' => (float) $this->unit_price,
            'line_tax' => (float) $this->line_tax,
            'line_total' => (float) $this->line_total,
        ];
    }
}
