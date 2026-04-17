<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\CollectionTodo;
use App\Dto\CreateTodo;
use App\Entity\Todo;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[ApiResource(
    shortName: 'Todo',
    stateOptions: new Options(entityClass: Todo::class),
)]
#[Post(input: CreateTodo::class)]
#[Patch]
#[Put]
#[Delete]
#[Get]
#[GetCollection(
    paginationEnabled: true,
    paginationItemsPerPage: 10,
    paginationMaximumItemsPerPage: 25,
    output: CollectionTodo::class,
)]
#[Map(target: Todo::class)]
class TodoResource
{
    #[ApiProperty(identifier: true)]
    public int $id;

    public string $title;

    public ?string $description;

    public bool $isDone;

    public ?\DateTimeImmutable $createdAt;

    public ?\DateTimeImmutable $updatedAt;
}
