<?php

namespace App\Dto\ProfessionalLiability;

use App\Enum\ProfessionalLiability\CoverageCeilingFormulaEnumeration;
use App\Enum\ProfessionalLiability\CoverageDeductibleFormulaEnumeration;
use JetBrains\PhpStorm\ArrayShape;

class GetQuoteRequestDTO
{

    /**
     * @param array $content
     */
    public function __construct(protected array $content)
    {

    }

    #[ArrayShape([
        'annualRevenue' => 'number',
        'enterpriseNumber' => 'string',
        'legalName' => 'string',
        'naturalPerson' => 'bool',
        'nacebelCodes' => 'array',
        'deductibleFormula' => CoverageDeductibleFormulaEnumeration::class,
        'coverageCeilingFormula' => CoverageCeilingFormulaEnumeration::class
    ])]
    public function getContent(): array
    {
        return $this->content;
    }

}
