<?php

namespace Spatie\Harvest\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Spatie\Harvest\Data\TimeEntryData;

class GetTimeEntries extends Request implements Paginatable
{
    public Method $method = Method::GET;

    public function __construct(
        protected ?string $from = null,
        protected ?string $to = null,
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
            'to' => $this->to ?? null,
            'user_id' => $this->userId ?? null,
        ];
    }

    /** @return array<TimeEntryData> */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $object) => TimeEntryData::createFromResponse($object),
            $response->json()['time_entries']
        );
    }
}
