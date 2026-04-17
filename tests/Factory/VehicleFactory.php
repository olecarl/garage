<?php

namespace App\Tests\Factory;

use App\Entity\Vehicle;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Vehicle>
 */
final class VehicleFactory extends PersistentObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Vehicle::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
    {
        $tsn = mb_strtoupper(
            self::faker()->randomLetter().
            self::faker()->randomLetter().
            self::faker()->randomLetter()
        ).
            self::faker()->randomNumber(5, true);

        return [
            'vim' => self::faker()->ean13().'0',
            'hsn' => self::faker()->randomElement(['0005', '7593', '0603', '0708']),
            'tsn' => $tsn,
            'type' => self::faker()->randomElement(['Kombi', 'Limousine', 'SUV', 'Coupe', 'Cabriolet']),
            'year' => self::faker()->date(format: 'Y', max: 'now'),
            'color' => self::faker()->colorName(),
            'name' => self::faker()->domainName(),
            'description' => self::faker()->text(255),
            'fuelType' => self::faker()->randomElement(['Benzin', 'Diesel', 'Gas', 'Elektro']),
            'mileage' => self::faker()->numberBetween(10000, 300000),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Vehicle $vehicle): void {})
        ;
    }
}
