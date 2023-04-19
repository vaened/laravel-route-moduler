<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Vaened\Support\Types\ArrayObject;

final class Modules extends ArrayObject
{
    protected function type(): string
    {
        return Module::class;
    }
}
