<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use function is_array;

final class Module
{
    public function __construct(
        private readonly string  $path,
        private readonly ?string $prefix,
        private readonly bool    $named,
        private readonly array   $middleware
    )
    {
    }

    public function isSingleFile(): bool
    {
        return false;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function prefix(): ?string
    {
        return $this->prefix;
    }

    public function named(): bool
    {
        return $this->named;
    }

    public function middleware(): array
    {
        return $this->middleware;
    }
}
