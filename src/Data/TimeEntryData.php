<?php

namespace Spatie\Harvest\Data;

use Carbon\Carbon;

class TimeEntryData
{
    public function __construct(
        public int $id,
        public Carbon $spentDate,
        public int $userId,
        public int $projectId,
        public int $taskId,
        public string $taskName,
        public float $hours,
        public ?string $notes = null,
    )
    {
    }

    /** @param array<string, mixed> $response */
    public static function createFromResponse(array $response): TimeEntryData
    {
        return new self(
            (int) $response['id'],
            Carbon::parse($response['spent_date']),
            (int) $response['user']['id'],
            (int) $response['project']['id'],
            (int) $response['task']['id'],
            (string) $response['task']['name'],
            $response['hours'],
            $response['notes'],
        );
    }
}
