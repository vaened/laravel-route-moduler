<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Vaened\Support\Types\TypedList;

final class Modules extends TypedList
{
    public static function from(iterable $modules): self
    {
        return new self($modules);
    }

    protected function type(): string
    {
        return Module::class;
    }
}
