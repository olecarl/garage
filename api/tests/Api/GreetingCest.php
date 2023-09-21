<?php

declare(strict_types=1);

namespace App\Tests\Api;

use App\Tests\ApiTester;

class GreetingCest
{
    public function _before(ApiTester $I): void
    {
        $I->am('API User');

        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
    }

    public function testGetGreetingCollection(ApiTester $I): void
    {
        $I->sendGet('/greetings');

        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }

    public function testCreateInvalidGreeting(ApiTester $I): void
    {
        $I->sendPost('/greetings', ['name' => '']);

        $I->seeResponseIsJson();
        $I->seeResponseContains('error');
    }

    public function testCreateValidGreeting(ApiTester $I): void
    {
        $I->sendPost('/greetings', ['name' => 'Api User']);

        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
                'name' => 'Api User'
        ]);
    }
}
