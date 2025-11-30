<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CompaniesHouseClient
{
    public function lookupCompany(string $companyNumber): ?array
    {
        $apiKey = config('companies-house.api_key');
        $baseUrl = rtrim(config('companies-house.base_url'), '/');

        if (! $apiKey) {
            return null;
        }

        $response = Http::withBasicAuth($apiKey, '')
            ->acceptJson()
            ->get($baseUrl.'/company/'.urlencode($companyNumber));

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}
