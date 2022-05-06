<?php

namespace App\Services;

use App\Dto\ProfessionalLiability\GetQuoteRequestDTO;
use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
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

    /**
     * @throws RequestException
     * @throws Exception
     */
    public function getQuote(GetQuoteRequestDTO $requestDTO): array
    {
        $response = $this->request->post(Config::get('professional-liability.api_url'), $requestDTO->getContent());
        $response->throw();
        $parsedBody = json_decode($response->body(), true);

        if (!$parsedBody) {
            throw new Exception('Invalid response from provider, please retry later.');
        }

        if (array_key_exists('success', $parsedBody) && !$parsedBody['success']) {
            throw new Exception($this->getErrorMessage($parsedBody));
        }

        return json_decode($response->body(), true);
    }

    private function getErrorMessage(array $body): string
    {
        return array_key_exists('data', $body)
                && array_key_exists('message', $body['data'])
                    ? "Error from provider : " . $body['data']['message']
                    : 'Unknown error from provider, please retry later.';
        }
}
