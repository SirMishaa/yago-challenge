<?php

namespace App\Enum\ProfessionalLiability;

use App\Enum\Concerns\EnumExtension;

enum CompanyActivityKind: string
{

    use EnumExtension;

    case Medical = 'medical';
    case Digital = 'digital';
    case Financial = 'financial';
    case Custom = 'custom';
}
