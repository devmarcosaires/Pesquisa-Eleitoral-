<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasEnumMethods
{
    public static function values(): array
    {
        $cases = static::cases();

        return isset($cases[0])
            ? array_column($cases, 'value')
            : array_column($cases, 'name');
    }

    public static function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    public static function options(): array
    {
        $cases = static::cases();

        foreach ($cases as $case) {
            $options[$case->value] = $case->description();
        }

        return $options;
    }

    public static function all(): Collection
    {
        $enums = collect();
        foreach (self::cases() as $enum) {
            $enums->put($enum->value, $enum->name());
        }

        return $enums;
    }

    public static function only(array $types): Collection
    {
        $enums = collect();
        foreach (self::cases() as $enum) {
            if (in_array($enum, $types)) {
                $enums->put($enum->value, $enum->name());
            }
        }

        return $enums;
    }
}
