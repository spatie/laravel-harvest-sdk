<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Resources\UserResource;

class GetAuthenticatedUser extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users/me';
    }

    public function createDtoFromResponse(Response $response): UserResource
    {
        return UserResource::createFromResponse($response->json());
    }
}
