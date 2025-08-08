<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Data\UserData;

class GetUsers extends Request
{
    public Method $method = Method::GET;

    public function __construct(
        public ?bool $active = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'is_active' => $this->active,
        ], fn (mixed $value) => $value !== null);
    }

    /** @return array<UserData> */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $object) => UserData::createFromResponse($object),
            $response->json()['users']
        );
    }
}
