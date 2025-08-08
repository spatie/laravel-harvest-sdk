<?php

namespace Spatie\Harvest;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Spatie\Harvest\Groups\ProjectGroup;
use Spatie\Harvest\Groups\UserGroup;

class Harvest extends Connector
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

    public function users(): UserGroup
    {
        return new UserGroup($this);
    }

    public function projects(): ProjectGroup
    {
        return new ProjectGroup($this);
    }
}
