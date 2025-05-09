<?php

namespace Spatie\Harvest\Resources;

use Carbon\CarbonImmutable;

class UserResource
{
    /**
     * @param array<string> $roles
     * @param array<string> $accessRoles
     */
    public function __construct(
        public int $id,
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $telephone,
        public string $timezone,
        public bool $hasAccessToAllFutureProjects,
        public bool $isContractor,
        public bool $isActive,
        public int $weeklyCapacity,
        public float $defaultHourlyRate,
        public float $costRate,
        public array $roles,
        public array $accessRoles,
        public string $avatarUrl,
        public CarbonImmutable $createdAt,
        public CarbonImmutable $updatedAt,
    ) {}

    /** @param array<string, mixed> $response */
    public static function createFromResponse(array $response): self
    {
        return new self(
            id: $response['id'],
            firstName: $response['first_name'],
            lastName: $response['last_name'],
            email: $response['email'],
            telephone: $response['telephone'],
            timezone: $response['timezone'],
            hasAccessToAllFutureProjects: $response['has_access_to_all_future_projects'],
            isContractor: $response['is_contractor'],
            isActive: $response['is_active'],
            weeklyCapacity: $response['weekly_capacity'],
            defaultHourlyRate: $response['default_hourly_rate'],
            costRate: $response['cost_rate'],
            roles: $response['roles'],
            accessRoles: $response['access_roles'],
            avatarUrl: $response['avatar_url'],
            createdAt: CarbonImmutable::parse($response['created_at']),
            updatedAt: CarbonImmutable::parse($response['updated_at']),
        );
    }
}
