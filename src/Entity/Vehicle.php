<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Enum\VehicleFuels;
use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[ApiResource(types: ['https://schema.org/Vehicle'])]
class Vehicle
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\NotBlank, Assert\Uuid]
    public ?Uuid $id;

    #[ORM\Column(type: 'string', length: 16, nullable: true)]
    #[Assert\Length(max: 16)]
    public ?string $vim = null;

    #[ORM\Column(type: 'string', length: 4, nullable: true)]
    #[Assert\Length(min: 4, max: 4)]
    public ?string $hsn = null;

    #[ORM\Column(type: 'string', length: 8, nullable: true)]
    #[Assert\Length(min: 3, max: 8)]
    public ?string $tsn = null;

    #[ORM\Column(length: 32, nullable: true)]
    #[Assert\Length(max: 32)]
    public ?string $type = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(min: 1900, max: 2026)]
    public ?int $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    public ?string $engine = null;

    #[ORM\Column(length: 32, nullable: true)]
    public ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    public ?string $image = null;

    #[ORM\Column(length: 32, nullable: true)]
    public ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    public ?string $description = null;

    #[ORM\Column(length: 8, nullable: true)]
    #[Assert\Length(max: 8), Assert\Choice(callback: [VehicleFuels::class, 'getValues'])]
    public ?string $fuelType = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    public ?float $fuelCapacity = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    public ?int $mileage = null;

    #[ORM\Column(length: 14, nullable: true)]
    public ?string $vin = null;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}
