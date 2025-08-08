<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\Harvest\Resources\ProjectResource;

class GetProjects extends Request
{
    public Method $method = Method::GET;

    public function __construct(
        public ?bool $active = null,
        public ?int $clientId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/projects';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'is_active' => $this->active,
            'client_id' => $this->clientId,
        ], fn (mixed $value) => $value !== null);
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
