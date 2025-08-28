<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Spatie\Harvest\Data\TimeEntryData;
use Spatie\Harvest\Data\UserData;

class GetTimeEntries extends Request implements Paginatable
{
    public Method $method = Method::GET;

    public function __construct(
        protected ?string $from = null,
        protected ?int $userId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/time_entries';
    }

    protected function defaultQuery(): array
    {
        return [
            'from' => $this->from ?? null,
            'user_id' => $this->userId ?? null,
        ];
    }

    /** @return array<UserData> */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $object) => TimeEntryData::createFromResponse($object),
            $response->json()['time_entries']
        );
    }
}
