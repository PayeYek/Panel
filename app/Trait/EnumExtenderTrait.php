<?php

namespace App\Trait;

trait EnumExtenderTrait
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function toString(): string
    {
        return strtolower($this->name);
    }

    public function label(): string
    {
        // Use the enum case name for dynamic translation
        $translationKey = 'enums.' . static::class . '.' . $this->name;
        return __($translationKey);
    }

    public static function options(): array
    {
        return array_map(fn($case) => ['id' => $case->value, 'label' => $case->label()], self::cases());
    }
}
