<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Vaened\Support\Types\SecureList;

final class Modules extends SecureList
{
    protected static function type(): string
    {
        return Module::class;
    }
}
