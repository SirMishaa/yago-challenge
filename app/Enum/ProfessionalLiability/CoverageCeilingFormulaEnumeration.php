<?php

namespace App\Enum\ProfessionalLiability;

use App\Enum\Concerns\EnumExtension;


enum CoverageCeilingFormulaEnumeration: string
{

    use EnumExtension;

    case Small = 'small';
    case Large = 'large';
}
