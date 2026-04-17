<?php

declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Metadata\ApiProperty;
use App\Entity\Vehicle;
use App\Enum\VehicleBrands;
use App\Enum\VehicleFuels;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\Validator\Constraints as Assert;

#[Map(target: Vehicle::class)]
final class CreateVehicle
{
    #[Assert\NotBlank, Assert\Length(min: 2, max: 32)]
    #[Assert\Choice(callback: [VehicleBrands::class, 'getValues'])]
    public string $brand;

    #[Assert\NotBlank, Assert\Length(max: 32)]
    public string $model;

    #[Assert\Range(min: 1920, max: 2026)]
    public ?int $year;

    #[ApiProperty(types: ['https://schema.org/vehicleIdentificationNumber'])]
    #[Assert\Length(max: 14)]
    public ?string $vim = null;

    #[Assert\Length(min: 4, max: 4)]
    public ?string $hsn = '1742';

    #[Assert\Length(min: 3, max: 8)]
    public ?string $tsn = 'ABC12345';

    #[Assert\PositiveOrZero]
    public ?int $mileage;

    //    #[Assert\NotBlank, Assert\Length(min: 3, max: 8), Assert\Choice(callback: [VehicleFuels::class, 'getValues'])]
    //    public ?string $fuelType = null;
}
