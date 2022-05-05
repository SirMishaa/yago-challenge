<?php

namespace App\Enum\Concerns;

use Error;
use Illuminate\Support\Str;

trait EnumExtension
{
    public function getLabel(): string
    {
        $label = __(Str::snake(class_basename($this)) . '.' . $this->value) ?? "";

        if (is_array($label)) {
            throw new Error('String type was excepted for label, array receive');
        }

        return $label;
    }

    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $enumeration) {
            $options[$enumeration->value] = $enumeration->getLabel();
        }
        return $options;
    }
}
