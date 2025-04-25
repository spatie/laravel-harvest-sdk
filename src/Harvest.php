<?php

namespace Spatie\Harvest;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

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
}
