<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'registered_name' => $this->registered_name,
            'registered_status' => $this->registered_status,
            'registered_address' => $this->registered_address,
            'paye_reference' => $this->paye_reference,
            'corporation_tax_utr' => $this->corporation_tax_utr,
            'vat_number' => $this->vat_number,
            'default_for_user' => $request->user()?->default_company_id === $this->id,
            'pivot_role' => $this->whenPivotLoaded('company_user', function () {
                return $this->pivot->role;
            }),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
