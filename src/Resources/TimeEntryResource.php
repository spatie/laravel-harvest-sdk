<?php

namespace Spatie\Harvest\Resources;

use Saloon\Http\BaseResource;
use Saloon\PaginationPlugin\Paginator;
use Spatie\Harvest\Harvest;
use Spatie\Harvest\Requests\GetTimeEntries;

/** @property Harvest $connector */
class TimeEntryResource extends BaseResource
{
    public function all(string $from, ?string $to, ?int $userId = null): Paginator
    {
        return $this->connector->paginate(new GetTimeEntries($from, $to, $userId));
    }
}
