<?php

namespace Spatie\Harvest;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\PaginationPlugin\PagedPaginator;
use Spatie\Harvest\Resources\ProjectResource;
use Spatie\Harvest\Resources\TimeEntryResource;
use Spatie\Harvest\Resources\UserResource;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Paginator;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\Http\Response;

class Harvest extends Connector implements HasPagination
{
    public function __construct(
        private string $accountId,
        private string $accessToken,
        private string $userAgent,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.harvestapp.com/v2';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Harvest-Account-Id' => $this->accountId,
            'User-Agent' => $this->userAgent,
        ];
    }

    protected function defaultAuth(): ?TokenAuthenticator
    {
        return new TokenAuthenticator($this->accessToken);
    }

    public function users(): UserResource
    {
        return new UserResource($this);
    }

    public function projects(): ProjectResource
    {
        return new ProjectResource($this);
    }

    public function timeEntries(): TimeEntryResource
    {
        return new TimeEntryResource($this);
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected function isLastPage(Response $response): bool
            {
                return is_null($response->json('next_page'));
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->dto();
            }
        };
    }
}
