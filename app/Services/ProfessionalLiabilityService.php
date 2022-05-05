<?php

namespace App\Services;

use App\Dto\ProfessionalLiability\GetQuoteRequestDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class ProfessionalLiabilityService
{
    private PendingRequest $request;

    public function __construct()
    {
        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "X-Api-Key" => Config::get('professional-liability.api_key')
        ];

        $this->request = Http::withHeaders($headers);
    }

    public function getQuote(GetQuoteRequestDTO $requestDTO): array
    {
        $response = $this->request->post(Config::get('professional-liability.api_url'), $requestDTO->getContent());
        return json_decode($response->body(), true);
    }
}
