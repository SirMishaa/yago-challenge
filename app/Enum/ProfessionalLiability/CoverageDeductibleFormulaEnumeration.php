<?php

namespace App\Enum\ProfessionalLiability;

use App\Enum\Concerns\EnumExtension;

enum CoverageDeductibleFormulaEnumeration: string
{
    use EnumExtension;

    case Small = 'small';
    case Medium = 'medium';
    case Large = 'large';
}
