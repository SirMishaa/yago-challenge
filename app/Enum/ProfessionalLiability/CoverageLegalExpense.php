<?php

namespace App\Enum\ProfessionalLiability;

use App\Enum\Concerns\EnumExtension;

enum CoverageLegalExpense: string
{
    use EnumExtension;

    case Cover = 'cover';
    case Uncover = 'uncover';
}
