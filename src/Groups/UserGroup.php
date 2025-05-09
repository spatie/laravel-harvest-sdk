<?php

namespace Spatie\Harvest\Groups;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Spatie\Harvest\Requests\GetUsers;

class UserGroup extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetUsers);
    }
}
