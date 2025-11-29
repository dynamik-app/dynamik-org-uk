<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstimateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'status' => $this->status,
            'issue_date' => $this->issue_date?->toDateString(),
            'due_date' => $this->due_date?->toDateString(),
            'notes' => $this->notes,
            'subtotal' => (float) $this->subtotal,
            'tax_total' => (float) $this->tax_total,
            'total' => (float) $this->total,
            'client' => $this->whenLoaded('client', function () {
                return [
                    'id' => $this->client->id,
                    'name' => $this->client->name,
                    'contact_name' => $this->client->contact_name,
                    'email' => $this->client->email,
                    'phone' => $this->client->phone,
                ];
            }),
            'company' => $this->whenLoaded('company', function () {
                return [
                    'id' => $this->company->id,
                    'registered_name' => $this->company->registered_name,
                ];
            }),
            'items' => EstimateItemResource::collection($this->whenLoaded('items')),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
