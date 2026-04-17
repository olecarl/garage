<?php

namespace App\Enum;

enum VehicleFuels: string
{
    case petrol = 'Benzin';
    case diesel = 'Diesel';
    case cng = 'CNG';
    case hybrid = 'Hybrid';
    case electric = 'Elektro';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
