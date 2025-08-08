<?php

namespace Spatie\Harvest\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Spatie\Harvest\Requests\GetProjects;

class ProjectResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetProjects);
    }
}
