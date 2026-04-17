<?php

declare(strict_types=1);

namespace App\Tests\Rest;

use App\Entity\Vehicle;
use App\Tests\Support\RestTester;
use Codeception\Attribute\Before;

/** @noinspection PhpUnused */
final class VehicleCest
{
    private ?string $id = null;

    public function _before(RestTester $I): void
    {
        $I->haveHttpHeader('Content-Type', 'application/ld+json');
    }

    /** @noinspection PhpUnused */
    /**
     * @throws \Exception
     */
    public function tryToPostVehicle(RestTester $I): void
    {
        $vehicle = [
            'year' => 2018,
            'mileage' => 100000,
            'fuelType' => 'Benzin',
        ];

        $I->am('API_USER');
        $I->wantTo('create new vehicle');
        $I->send('POST', '/vehicles', $vehicle);

        $I->expect('valid json response');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();

        $I->expect('response matches json type');
        $I->seeResponseMatchesJsonType([
            '@context' => 'string',
            '@id' => 'string',
            '@type' => 'string',
        ]);

        $I->expect('response contains json');
        $I->seeResponseContainsJson([
            '@context' => '/contexts/Vehicle',
            '@type' => 'https://schema.org/Vehicle',
        ]);

        if (!empty($id = $I->grabDataFromResponseByJsonPath('$..id'))) {
            $this->id = $id[0];
        }
    }

    #[Before('tryToPostVehicle')]
    public function tryToGetVehicle(RestTester $I): void
    {
        if (empty($this->id)) {
            $vehicles = $I->grabEntitiesFromRepository(Vehicle::class, []);
            $this->id = $vehicles[0]->id->toString();
        }

        $I->am('API_USER');
        $I->wantTo('get vehicle');
        $I->send('GET', '/vehicles/'.$this->id);
        $I->expect('valid json response');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }

    public function tryToPatchVehicle(RestTester $I): void
    {
        $I->markTestIncomplete('Not implemented yet');
    }

    public function tryToDeleteVehicle(RestTester $I): void
    {
        $I->markTestIncomplete('Not implemented yet');
    }
}
