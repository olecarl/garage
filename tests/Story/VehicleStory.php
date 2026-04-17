<?php

namespace App\Tests\Story;

use App\Tests\Factory\VehicleFactory;
use Zenstruck\Foundry\Story;

final class VehicleStory extends Story
{
    public function build(): void
    {
        VehicleFactory::createMany(100);
    }
}
