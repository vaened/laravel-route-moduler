<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Illuminate\Config\Repository as Config;

use function array_map;

final class ModuleProvider
{
    public function __construct(private readonly Config $repository)
    {
    }

    public function modules(): Modules
    {
        return Modules::from(
            array_map(
                static fn(array $setting) => new Module(
                    $setting['path'],
                    $setting['prefix'],
                    $setting['named'],
                    $setting['middleware'],
                ),
                $this->repository->get('route-moduler', [])
            )
        );
    }
}
