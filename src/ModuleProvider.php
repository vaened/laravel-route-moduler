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
    private readonly Modules $modules;

    public function __construct(private readonly Config $repository)
    {
        $this->modules = new Modules(
            array_map(self::toModule(), $this->repository->get(RouteModuleProvider::CONFIG_FILE, []))
        );
    }

    public function modules(): Modules
    {
        return $this->modules;
    }

    private static function toModule(): callable
    {
        return static fn(array $setting) => new Module(
            $setting['path'],
            $setting['prefix'],
            $setting['named'],
            $setting['middleware'],
        );
    }
}
