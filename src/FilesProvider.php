<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use RecursiveDirectoryIterator;
use SplFileInfo;
use Vaened\Support\Types\ArrayList;

final class FilesProvider
{
    public function __construct(private readonly ModuleProvider $provider)
    {
    }

    public function files(): ArrayList
    {
        return $this->provider->modules()->flatMap(self::filesFromModule());
    }

    private static function filesFromModule(): callable
    {
        return static fn(
            Module $module
        ) => self::toFiles($module)
                 ->filter(self::onlyFiles())
                 ->map(self::routesFrom($module));
    }

    private static function toFiles(Module $module): ArrayList
    {
        return new ArrayList(
            !$module->isSingleFile()
                ? new RecursiveDirectoryIterator($module->path())
                : [new SplFileInfo($module->path())]
        );
    }

    private static function onlyFiles(): callable
    {
        return static fn(SplFileInfo $file) => !$file->isDir();
    }

    private static function routesFrom(Module $module): callable
    {
        return static fn(SplFileInfo $file) => new RouteFile($module, $file);
    }
}
