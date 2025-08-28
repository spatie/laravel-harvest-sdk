<?php

namespace Spatie\Harvest\Resources;

use Saloon\Http\BaseResource;
use Saloon\PaginationPlugin\Paginator;
use Spatie\Harvest\Requests\GetTimeEntries;

class TimeEntryResource extends BaseResource
{
    public function all(string $from, ?int $userId = null): Paginator
    {
        return $this->connector->paginate(new GetTimeEntries($from, $userId));
    }
}
