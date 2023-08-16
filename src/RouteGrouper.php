<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

namespace Vaened\LaravelRouteModuler;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Vaened\Support\Types\ArrayList;

use function base_path;

class RouteGrouper
{
    public function __construct(private readonly ModuleProvider $provider)
    {
    }

    public function routeModules(): ArrayList
    {
        return $this->provider->modules()
                              ->flatMap($this->breakdownFiles());
    }

    private function breakdownFiles(): callable
    {
        return function (Module $module): array {
            $files = $this->getRoutesModule($module->path());

            return (new ArrayList($files))
                ->filter(static fn(SplFileInfo $file) => !$file->isDir())
                ->map(static fn(SplFileInfo $file) => new RouteFile($module, $file))
                ->items();
        };
    }

    private function getRoutesModule(string $path): RecursiveIteratorIterator
    {
        return new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(base_path($path))
        );
    }
}
