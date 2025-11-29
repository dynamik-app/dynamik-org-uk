<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Concerns\HandlesCompanyAccess;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use HandlesCompanyAccess;

    public function index(Request $request)
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing clients.',
            ], 422);
        }

        $clients = $company->clients()->latest()->paginate(20);

        return ClientResource::collection($clients);
    }

    public function store(Request $request)
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing clients.',
            ], 422);
        }

        $validated = $this->validateClient($request);

        $client = $company->clients()->create($validated);

        return ClientResource::make($client)
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Client $client)
    {
        $this->authorizeCompanyAccess($request->user(), $client->company);

        return ClientResource::make($client);
    }

    public function update(Request $request, Client $client): JsonResponse
    {
        $this->authorizeCompanyAccess($request->user(), $client->company);

        $validated = $this->validateClient($request);

        $client->update($validated);

        return ClientResource::make($client)
            ->response();
    }

    private function validateClient(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:20'],
        ]);
    }
}
