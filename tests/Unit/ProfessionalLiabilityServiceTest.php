<?php

use App\Dto\ProfessionalLiability\GetQuoteRequestDTO;
use App\Enum\ProfessionalLiability\CoverageCeilingFormulaEnumeration;
use App\Enum\ProfessionalLiability\CoverageDeductibleFormulaEnumeration;
use App\Services\ProfessionalLiabilityService;

it('should return an exception when we specify a bad DTO', function () {
    $professionalLiabilityService = new ProfessionalLiabilityService();
    $requestDTO = new GetQuoteRequestDTO([]);
    expect($professionalLiabilityService->getQuote($requestDTO));
})->throws(Exception::class);


it('should return a quote when we fill with valid DTO', function () {
    $professionalLiabilityService = new ProfessionalLiabilityService();
    $requestDTO = new GetQuoteRequestDTO([
        'annualRevenue' => 120000,
        'enterpriseNumber' => '0123456789',
        'legalName' => 'My company',
        'naturalPerson' => true,
        'nacebelCodes' => ['12345', '54321'],
        'deductibleFormula' => CoverageDeductibleFormulaEnumeration::Large,
        'coverageCeilingFormula' => CoverageCeilingFormulaEnumeration::Large,
    ]);

    $response = $professionalLiabilityService->getQuote($requestDTO);
    expect($response['success'])->toBe(true);
    expect($response['data'])->toBeArray();
    expect($response['data']['grossPremiums'])->toBeArray();
});
