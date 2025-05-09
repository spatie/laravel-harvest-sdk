<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Resources\UserResource;

class GetUsers extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    /** @return array<UserResource> */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $object) => UserResource::createFromResponse($object),
            $response->json()
        );
    }
}
