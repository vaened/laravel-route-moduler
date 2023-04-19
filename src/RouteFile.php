<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

namespace Vaened\LaravelRouteModuler;

use SplFileInfo;

use function array_filter;
use function implode;
use function preg_replace;

class RouteFile
{
    private readonly array $middleware;

    private readonly string $prefix;

    private readonly string $path;

    public function __construct(Module $module, SplFileInfo $file)
    {
        $this->prefix     = $this->buildPrefix(
            $module->named() ? preg_replace('/\.php$/', '', $file->getFilename()) : null,
            $module->prefix()
        );
        $this->path       = $file->getPathname();
        $this->middleware = $module->middleware();
    }

    public function prefix(): string
    {
        return $this->prefix;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function middleware(): array
    {
        return $this->middleware;
    }

    private function buildPrefix(?string $filename, ?string $modulePrefix): string
    {
        return implode(
            '/',
            array_filter([
                $modulePrefix,
                $filename,
            ], static fn(?string $segment) => null !== $segment)
        );
    }
}
