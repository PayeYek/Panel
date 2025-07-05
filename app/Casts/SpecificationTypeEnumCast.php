<?php

namespace App\Casts;

use App\Enum\SpecificationTypeEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class SpecificationTypeEnumCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): string
    {
        return SpecificationTypeEnum::tryFrom($value)?->toString() ?? 'unknown';
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?int
    {
        return SpecificationTypeEnum::tryFrom($value)?->value ?? null;
    }
}
