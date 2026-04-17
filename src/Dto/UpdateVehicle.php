<?php

declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Metadata\ApiProperty;
use App\Entity\Vehicle;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\Validator\Constraints as Assert;

#[Map(target: Vehicle::class)]
final class UpdateVehicle
{
    #[ApiProperty(types: ['https://schema.org/name'])]
    #[Assert\NotBlank, Assert\Length(max: 32)]
    public ?string $name = null;

    #[ApiProperty(types: ['https://schema.org/description'])]
    #[Assert\Length(min: 12, max: 255)]
    public ?string $description = null;

    #[ApiProperty(types: ['https://schema.org/image'])]
    public ?string $image = null;
}
