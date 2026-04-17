<?php

namespace App\Dto;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

class VehicleCollection
{
    #[ApiProperty(identifier: true)]
    public string $id;

    #[ApiProperty(types: ['https://schema.org/brand'])]
    #[Assert\NotBlank, Assert\Length(min: 2, max: 32)]
    public string $brand;

    #[Assert\Length(max: 4)]
    public ?string $hsn = null;

    #[ApiProperty(types: ['https://schema.org/model'])]
    #[Assert\NotBlank, Assert\Length(max: 32)]
    public string $model;

    #[Assert\Length(min: 3, max: 8)]
    public ?string $tsn = null;

    #[ApiProperty(types: ['https://schema.org/modelDate'])]
    #[Assert\Range(min: 1900, max: 2026)]
    public ?int $year = null;
}
