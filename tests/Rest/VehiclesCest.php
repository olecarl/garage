<?php

declare(strict_types=1);

namespace App\Tests\Rest;

use App\Tests\Support\RestTester;
use Codeception\Attribute\Examples;
use Codeception\Example;

/** @noinspection PhpUnused */
final class VehiclesCest
{
    public function _before(RestTester $I): void
    {
        $I->haveHttpHeader('Content-Type', 'application/ld+json');
    }

    /** @noinspection PhpUnused */
    /**
     * @throws \Exception
     */
    #[Examples(url: '/vehicles')]
    #[Examples(url: '/vehicles?page=1')]
    #[Examples(url: '/vehicles?page=1&itemsPerPage=30')]
    #[Examples(url: '/vehicles?itemsPerPage=30')]
    public function testPagination(RestTester $I, Example $example): void
    {
        $I->am('API_USER');
        $I->amGoingTo('get vehicles collection');
        $I->send('GET', $example['url']);

        $I->expect('valid json response');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();

        $I->expect('response matches json type');
        $I->seeResponseMatchesJsonType([
            '@context' => 'string',
            '@id' => 'string',
            '@type' => 'string',
            'totalItems' => 'integer',
            'member' => 'array',
            'view' => 'array',
        ]);

        $I->expect('response contains json');
        $I->seeResponseContainsJson([
            '@context' => '/contexts/Vehicle',
            '@id' => '/vehicles',
            '@type' => 'Collection',
            'totalItems' => 100,
        ]);

        $I->expectTo('100 items in total');
        $totalItems = $I->grabDataFromResponseByJsonPath('$..totalItems');
        $I->assertEquals([100], $totalItems);

        $I->expectTo('30 items per page');
        $members = $I->grabDataFromResponseByJsonPath('$..member[*]');
        $I->assertEquals(30, \count($members));
    }
}
