<?php

namespace Spatie\Harvest\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Spatie\Harvest\Requests\GetAuthenticatedUser;
use Spatie\Harvest\Requests\GetUsers;

class UserResource extends BaseResource
{
    public function me(): Response
    {
        return $this->connector->send(new GetAuthenticatedUser);
    }

    public function all(): Response
    {
        return $this->connector->send(new GetUsers);
    }
}
