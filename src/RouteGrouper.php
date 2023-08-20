<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

namespace Vaened\LaravelRouteModuler;

use Vaened\Support\Types\ArrayList;

class RouteGrouper
{
    public function __construct(
        private readonly FilesProvider $provider,
    )
    {
    }

    public function routeModules(): ArrayList
    {
        return $this->provider->files();
    }
}
