<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Data\UserData;

class GetAuthenticatedUser extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users/me';
    }

    public function createDtoFromResponse(Response $response): UserData
    {
        return UserData::createFromResponse($response->json());
    }
}
