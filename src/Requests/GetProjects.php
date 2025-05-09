<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Resources\ProjectResource;

class GetProjects extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/projects';
    }

    /** @return array<ProjectResource> */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $object) => ProjectResource::createFromResponse($object),
            $response->json()
        );
    }
}
